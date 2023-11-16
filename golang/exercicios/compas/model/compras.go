package model

import (
	"errors"
	"time"
)

func NewCompra(mercado string, date time.Time, itens []Item) (*Compras, error) {

	if mercado == "" {
		return nil, errors.New("mercado obrigatorio")
	}

	if len(itens) == 0 {
		return nil, errors.New("itens obirgatorios")
	}

	return &Compras{
		Mercado: mercado,
		Data:    date,
		Itens:   itens,
	}, nil
}

type Compras struct {
	Data    time.Time
	Mercado string
	Itens   []Item
}

type Item struct {
	Item       string
	Quantidade int
}
