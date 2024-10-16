@props(['name'])

<i class="{{ $name }} fs-2">
   @php
      $icons = [
          'ki-duotone ki-credit-cart' => 2,
          'ki-duotone ki-setting-4' => 0,
          'ki-duotone ki-lots-shopping' => 8,
          'ki-duotone ki-credit-cart' => 2,
          'ki-duotone ki-category' => 4,
          'ki-duotone ki-subtitle' => 5,
      ];

      if (array_key_exists($name, $icons)) {
          for ($i = 1; $i <= $icons[$name]; $i++) {
              echo "<span class='path{$i}'></span>";
          }
      }
   @endphp
</i>
