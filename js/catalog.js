const minRange = document.getElementById("min-range");
    const maxRange = document.getElementById("max-range");
    const minPrice = document.getElementById("min-price");
    const maxPrice = document.getElementById("max-price");

    function updateValues() {
        let minValue = parseInt(minRange.value);
        let maxValue = parseInt(maxRange.value);

        if (minValue >= maxValue) {
            minRange.value = maxValue - 1;
            minValue = maxValue - 1;
        }

        minPrice.value = minValue + " €";
        maxPrice.value = maxValue + " €";
    }

    minRange.addEventListener("input", updateValues);
    maxRange.addEventListener("input", updateValues);