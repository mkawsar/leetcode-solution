# Leetcode 28
# Dividing two integers can be done efficiently by repeated subtraction or using bit manipulation
class Solution:
    def divide(self, dividend: int, divisor: int) -> int:
        INT_MAX = 2**31 - 1
        INT_MIN = -2**31

        if dividend == 0:
            return 0
        if divisor == 1:
            return min(max(INT_MIN, dividend), INT_MAX)
        if dividend == INT_MIN and divisor == -1:
            return INT_MAX

        is_negative = (dividend < 0) ^ (divisor < 0)
        dividend, divisor = abs(dividend), abs(divisor)

        quotient = 0
        while dividend >= divisor:
            temp_divisor, multiple = divisor, 1

            while dividend >= (temp_divisor << 1):
                temp_divisor <<= 1
                multiple <<= 1

            dividend -= temp_divisor
            quotient += multiple

        return -quotient if is_negative else quotient

# Example usage
dividend = 10
divisor = 3
result = Solution().divide(dividend, divisor)
print("Result:", result)
