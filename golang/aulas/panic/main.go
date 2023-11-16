package main

import (
	"fmt"
	"os"
)

func ShowText() {
	fmt.Println("Finaliznado de manipular o arquivo")
}

func ReadFile() {

	defer func() {
		if r := recover(); r != nil {
			fmt.Println("Recuperado ....")
		}
	}()

	_, err := os.Open("./settings2.txt")
	if err != nil {
		panic("FileNotExists")
	}
}

func main() {

	fmt.Println("Iniciando.... ")

	/*
		//panic("error")
			file, err := os.Create("./settings.txt")
			//_, err := os.Open("settings.txt")
			defer file.Close()
			defer ShowText()

			if err != nil {
				panic(err)
			}

			_, err = file.Write([]byte("teste"))

			if err != nil {
				panic(err)
			}
	*/

	ReadFile()

	fmt.Println("Encerrado")
}
