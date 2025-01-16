<?php

class Movie
{
  public $id;
  public $title;
  public $category;
  public $year_of_release;
  public $description;
  public $cover;
  public $user_id;
  public $rating_average;
  public $ratings_count;

  public function query($where, $params)
  {
    $database = new Database(config('database'));

    return $database->query(
      query: "select 
                m.id, m.title, m.category, m.year_of_release, m.description, m.cover,
                ifnull(sum(r.rating) / count(r.id), 0) as rating_average,
                ifnull(count(r.id), 0) as ratings_count
              from
                movies m
                left join ratings r on r.movie_id = m.id
              where 
                $where
              group by
                m.id, m.title, m.category, m.year_of_release, m.description, m.cover",
      class: self::class,
      params: $params
    );
  }

  public static function get($movie_id)
  {
    return (new self)->query('m.id = :movie_id', compact('movie_id'))->fetch();
  }

  public static function all($search = '')
  {
    return (new self)->query('title like :filter or category like :filter or year_of_release like :filter', ['filter' => "%$search%"])->fetchAll();
  }
}