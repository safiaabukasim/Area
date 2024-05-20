import sys

def calculate_area(length, width):
    return length * width

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Error: Two numbers are required.")
        sys.exit(1)

    try:
        length = float(sys.argv[1])
        width = float(sys.argv[2])
    except ValueError:
        print("Error: Please enter valid numbers.")
        sys.exit(1)

    result = calculate_area(length, width)
    print(result)


