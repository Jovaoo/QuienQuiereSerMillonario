
<script>
// Generar cuatro números aleatorios que cumplan con las condiciones específicas
let num1, num2, num3, num4;
do {
    num1 = Math.floor(Math.random() * 41) + 50; // Número entre 60 y 100
    num2 = Math.floor(Math.random() * (101 - num1));
    num3 = Math.floor(Math.random() * (101 - num1 - num2));
    num4 = 100 - (num1 + num2 + num3);
} while (num4 <= 0);

// Mostrar los cuatro números generados
console.log(`Número 1: ${num1}`);
console.log(`Número 2: ${num2}`);
console.log(`Número 3: ${num3}`);
console.log(`Número 4: ${num4}`);

</script>