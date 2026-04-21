let a = 10;
let b = 20;
a = a + b;
b = a - b;
a = a - b;

console.log("a=", a);
console.log("b=", b);


function square(n) {
    return n * n;
}

for (let i = 1; i <= 10; i++) {
    console.log("for i=", square(i));
}


const numbers = [12, 45, 7, 89, 23, 56];

let largest = numbers[0];

for (let i = 1; i < numbers.length; i++) {
    largest = numbers[i] > largest ? numbers[i] : largest;
}


console.log("largest number=", largest);