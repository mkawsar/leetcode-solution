//Wildcard Matching

function isMatch(s: string, p: string): boolean {
    const m = s.length;
    const n = p.length;

    // Create a 2D array for dynamic programming
    const dp: boolean[][] = new Array(m + 1).fill(false).map(() => new Array(n + 1).fill(false));
    // Empty string and empty pattern match
    dp[0][0] = true;

    // Handle patterns that start with '*'
    for (let j = 1; j <= n; j++) {
        if (p[j - 1] === '*') {
            dp[0][j] = dp[0][j - 1];
        }
    }

    // Fill the dp array
    for (let i = 1; i <= m; i++) {
        for (let j = 1; j <= n; j++) {
            if (s[i - 1] === p[j - 1] || p[j - 1] === '?') {
                dp[i][j] = dp[i - 1][j - 1];
            } else if (p[j - 1] === '*') {
                dp[i][j] = dp[i][j - 1] || dp[i - 1][j];
            }
        }
    }

    return dp[m][n];
}

// Example usage
const s = "adceb";
const p = "*a*b";
console.log("Is Match:", isMatch(s, p)); // Output: true
