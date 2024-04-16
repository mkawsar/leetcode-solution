// multiplying two strings

function multiply(num1: string, num2: string): string {
    const m: number = num1.length;
    const n: number = num2.length;

    const result: number[] = new Array(m + n).fill(0);

    for (let i = m - 1; i >= 0; i--) {
        for (let j = n - 1; j >= 0; j--) {
            const mul: number = (num1.charCodeAt(i) - '0' . charCodeAt(0)) * (num2.charCodeAt(j) - '0' . charCodeAt(0));
            const sum: number = mul + result[i + j + 1];
            result[i + j] += Math.floor(sum / 10);
            result[i + j + 1] = sum % 10;
        }
    }

    let resultStr: string = '';

    for (let digit of result) {
        if (!(resultStr === '' && digit === 0)) {
            resultStr += digit;
        }
    }

    return resultStr === '' ? '0' : resultStr;
};

// Example usage
const num1: string = "123";
const num2: string = "456";
console.log("Product:", multiply(num1, num2));