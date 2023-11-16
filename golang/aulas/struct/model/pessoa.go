package model

import "time"

type Pessoa struct {
	Nome             string
	DataDeNascimento time.Time
	Endereco         Endereco
	Idade            int
}

func (p Pessoa) IdadeAtual() int {
	anoDeNascimento := p.DataDeNascimento.Year()
	anoAtual := time.Now().Year()
	return anoAtual - anoDeNascimento
}

func CalculaIdade(p Pessoa) int {
	anoDeNascimento := p.DataDeNascimento.Year()
	anoAtual := time.Now().Year()
	return anoAtual - anoDeNascimento
}

func (p *Pessoa) CalculaIdade2() {
	anoDeNascimento := p.DataDeNascimento.Year()
	anoAtual := time.Now().Year()
	p.Idade = anoAtual - anoDeNascimento
}
