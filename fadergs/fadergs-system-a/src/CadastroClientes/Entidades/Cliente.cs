﻿using System;
using System.Collections.Generic;

namespace CadastroClientes.Entidades
{
    public class Cliente
    {
        public int Id { get; set; }
        public string NomeCompleto { get; set; }
        public DateTime DataNascimento { get; set; }
        public int EstadoCivil { get; set; }
        public string Sexo { get; set; }
        public long RG { get; set; }
        public long CPF { get; set; }
        public string Pais { get; set; }
        public string Estado { get; set; }
        public string Cidade { get; set; }
        public string Bairro { get; set; }
        public string CEP { get; set; }
        public string Logradouro { get; set; }
        public string Complemento { get; set; }
        public int Numero { get; set; }
        public List<string> listaTelefones { get; set; }      
        public DateTime DataRegistro { get; set; }
    }
}
