<?php

// Mensagens de validações de cada formulário
$validationsMessages = flash()->get("validations_$form") ?? null;

// SESSION validations_Login
$sessionLoginValidations = $_SESSION['flash_validations_login'] ?? null;

// SESSION FormData para recuperar os valores do form
$formData = flash()->get("validations_$form") ? (flash()->get("formData") ?? []) : [];

// Ativar o botão de limpar o campo se campo estiver preenchido
$hidden = ($formData[$name] ?? '') ? '' : 'hidden';

?>

<div>
  <div class="flex items-center relative">
    <input
      type="<?= $type ?>"
      name="<?= $name ?>"
      placeholder="<?= $placeholder ?>"
      class="inpForm <?php if (!isset($validationsMessages["$field"]) && !isset($sessionLoginValidations)) echo 'valid'; ?>"
      value="<?= htmlspecialchars($formData[$name] ?? '') ?>"
      required />

    <i class="
      <?php
      echo $classIcon;

      if (isset($sessionLoginValidations)) {
        echo $validationsMessages ? ' text-error-base' : '';
      } elseif (isset($validationsMessages["$field"])) {
        echo ' text-error-base';
      }
      ?>

      icon text-xl absolute left-4 pointer-events-none"
    ></i>

    <button type="button" class=" <?= $hidden ?> cleanBtn flex absolute right-4 text-gray-4 hover:text-purple-base outline-none focus:text-purple-base cursor-pointer" />
    <i class="ph-fill ph-x-circle text-xl"></i>
    </button>
  </div>

  <?php if (isset($validationsMessages["$field"])): ?>
    <ul class="mt-2 ml-1 flex flex-wrap gap-x-3">
      <?php foreach ($validationsMessages["$field"] as $messages): ?>
        <li class="flex gap-1.5 items-center text-start text-error-light">
          <i class="ph ph-warning text-base"></i>
          <span class="text-xs mt-[2px]"><?= $messages ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>