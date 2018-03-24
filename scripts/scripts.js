const sum = (a, b) => a + b;

const sumAny = (...numbers) => numbers.reduce((p, c) => p + c, 0);

// console.log(sumAny(1, 2, 3));

const fizzBuzzTest = () => [...Array(100).keys()].forEach(e => {
  const ePlusOne = e + 1;
  if (ePlusOne % 15 === 0) {
    return 
  }
})