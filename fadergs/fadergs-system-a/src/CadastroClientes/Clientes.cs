using CadastroClientes.AcessoDados.Repositorio;
using CadastroClientes.Entidades;
using System;
using System.Collections.Generic;

namespace CadastroClientes.Aplicacao
{
    public class Clientes
    {
        private RepositorioClientes _repositorioClientes;
        private Notificacoes _notificacoes;

        public void Atualizar(Cliente cliente) {
            _repositorioClientes = new RepositorioClientes();
            _notificacoes = new Notificacoes();

            try {
                _repositorioClientes.Atualizar(cliente);
                _notificacoes.Nova("Cliente atualizado com sucesso", "Atualização cliente");
            } catch (Exception ex) {
                _notificacoes.Nova(ex.Message, "Erro ao atualizar cliente");
            } finally {
                _repositorioClientes = null;
            }
        }

        public void Excluir(int Id) {
            _repositorioClientes = new RepositorioClientes();
            _notificacoes = new Notificacoes();

            try {
                _repositorioClientes.Excluir(Id);
                _notificacoes.Nova("Cliente excluído com sucesso", "Exclusão cliente");
            } catch (Exception ex) {
                _notificacoes.Nova(ex.Message, "Erro ao excluir cliente");
            } finally {
                _repositorioClientes = null;
            }
        }

        public void Incluir(Cliente cliente) {
            _repositorioClientes = new RepositorioClientes();
            _notificacoes = new Notificacoes();

            try {
                _repositorioClientes.Salvar(cliente);
                _notificacoes.Nova("Novo cliente salvo com sucesso!", "Novo cliente");
            } catch (Exception ex) {
                _notificacoes.Nova(ex.Message, "Erro ao salvar cliente");
            } finally {
                _repositorioClientes = null;
            }

            _repositorioClientes = null;
            _notificacoes = null;
        }

        public List<Cliente> Todos() {
            _repositorioClientes = new RepositorioClientes();
            _notificacoes = new Notificacoes();

            List<Cliente> listaClientes = new List<Cliente>();

            try {
                listaClientes = _repositorioClientes.CarregarTodos();
            } catch (Exception ex) {
                _notificacoes.Nova(ex.Message, "Erro ao carregar lista de cliente");
            } finally {
                _repositorioClientes = null;
            }

            _repositorioClientes = null;
            _notificacoes = null;

            return listaClientes;
        }                

        public bool CadastroValido(string nome, string sexo, string cpf, string pais, string estado, string cidade, string bairro, string cep, string logradouro, string complemento, string numero, string celular1) {
            _notificacoes = new Notificacoes();
            bool valido = true;

            if (string.IsNullOrEmpty(nome)) valido = false;
            if (string.IsNullOrEmpty(sexo)) valido = false;
            if (string.IsNullOrEmpty(cpf)) valido = false;
            if (string.IsNullOrEmpty(pais)) valido = false;
            if (string.IsNullOrEmpty(estado)) valido = false;
            if (string.IsNullOrEmpty(cidade)) valido = false;
            if (string.IsNullOrEmpty(bairro)) valido = false;
            if (string.IsNullOrEmpty(cep)) valido = false;
            if (string.IsNullOrEmpty(logradouro)) valido = false;
            if (string.IsNullOrEmpty(complemento)) valido = false;
            if (string.IsNullOrEmpty(numero)) valido = false;
            if (string.IsNullOrEmpty(celular1)) valido = false;

            if (!valido) _notificacoes.Nova("Cadastro de cliente inválido!", "Novo cliente");

            return valido;
        }

        public void ExportarListParaCSV() {
            Arquivos arquivos = new Arquivos();

            try {
                arquivos.ExportarListaParaCSV(Todos());

                _notificacoes = new Notificacoes();
                _notificacoes.Nova("Arquivo Exportado com Sucesso!", "Arquivo CSV");
            } catch (Exception ex) {
                _notificacoes = new Notificacoes();
                _notificacoes.Nova(ex.Message, "Erro ao exportar arquivo .CSV!");
            }

            arquivos = null;
            _notificacoes = null;
        }
    }
}