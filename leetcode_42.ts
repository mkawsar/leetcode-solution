//The Trapping Rain Water problem on LeetCode involves calculating how much water can be trapped after raining, given an array where each element represents the height of a bar.
function trap(height: number[]): number {
    const n: number = height.length;
    if (n === 0) return 0;

    const leftMax: number[] = new Array(n).fill(0);
    const rightMax: number[] = new Array(n).fill(0);

    // Compute the highest bar to the left of each bar
    leftMax[0] = height[0];
    for (let i = 1; i < n; i++) {
        leftMax[i] = Math.max(leftMax[i - 1], height[i]);
    }

    // Compute the highest bar to the right of each bar
    rightMax[n - 1] = height[n - 1];
    for (let i = n - 2; i >= 0; i--) {
        rightMax[i] = Math.max(rightMax[i + 1], height[i]);
    }

    let water: number = 0;
    // Calculate the amount of water trapped at each bar
    for (let i = 0; i < n; i++) {
        water += Math.min(leftMax[i], rightMax[i]) - height[i];
    }

    return water;
}

const height: number[] = [0,1,0,2,1,0,1,3,2,1,2,1];
console.log("Amount of water trapped:", trap(height));