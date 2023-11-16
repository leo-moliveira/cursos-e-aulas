package main

import "fmt"

func main() {
	x := 5
	y := &x

	*y = 10

	fmt.Println(x, *y)
	fmt.Println(&x, y)

	printValues(&x, y)
	fmt.Println(x, *y)

}

func printValues(x *int, y *int) {
	*x = 20
	//fmt.Println(*x, *y)
	//fmt.Println(x, y)
}
