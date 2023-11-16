package main

import (
	"fmt"
	"time"
)
import "compas/model"

func main() {

	fmt.Println("Iniciando.... \n")
	itens := make([]model.Item, 0)
	itens = append(itens, model.Item{Item: "teste 1", Quantidade: 1})
	itens = append(itens, model.Item{Item: "teste 2", Quantidade: 2})
	itens = append(itens, model.Item{Item: "teste 3", Quantidade: 3})
	itens = append(itens, model.Item{Item: "teste 4", Quantidade: 5})

	compras, err := model.NewCompra("mercado de teste", time.Now(), itens)

	if err != nil {
		fmt.Println(err.Error())
	} else {
		fmt.Println(compras)
	}
}
