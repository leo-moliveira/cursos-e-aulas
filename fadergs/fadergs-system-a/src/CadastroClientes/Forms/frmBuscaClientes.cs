using CadastroClientes.Aplicacao;
using CadastroClientes.Enumerados;
using CadastrodeClientes;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CadastroClientes.Forms
{
    public partial class frmBuscaClientes : Form
    {
        public Form RefInstanciaForm { get; set; }
        public bool ClienteSelecionado { get; set; }

        public frmBuscaClientes() {
            InitializeComponent();
        }

        private void frmBuscaClientes_Load(object sender, EventArgs e) {
            CarregarLayoutGrid();
        }

        private void grid_CellDoubleClick(object sender, DataGridViewCellEventArgs e) {
            Notificacoes _notificacoes = new Notificacoes();

            try {
                ClienteSelecionado = true;
                frmCadClientes frmCadClientes = new frmCadClientes();
                eEstadoCivil eEstCivil = (eEstadoCivil)int.Parse(grid.Rows[grid.CurrentRow.Index].Cells[3].Value?.ToString());

                frmCadClientes.IdCliente = int.Parse(grid.Rows[grid.CurrentRow.Index].Cells[0].Value?.ToString());
                frmCadClientes.txtNome.Text = grid.Rows[grid.CurrentRow.Index].Cells[1].Value?.ToString();

                DateTime dataNasc = DateTime.Parse(grid.Rows[grid.CurrentRow.Index].Cells[2].Value?.ToString());
                TimeZoneInfo horaBrasilia = TimeZoneInfo.FindSystemTimeZoneById("E. South America Standard Time");
                frmCadClientes.mtxtDataNascimento.Text = TimeZoneInfo.ConvertTimeFromUtc(dataNasc, horaBrasilia).ToShortDateString();

                frmCadClientes.mtxtDataNascimento.Text = DateTime.Parse(grid.Rows[grid.CurrentRow.Index].Cells[2].Value?.ToString()).ToShortDateString();
                frmCadClientes.EstadoCivil = eEstCivil.ToString();
                Util.MarcarCampoSexo(frmCadClientes.gbSexo, Util.ObterSexoExtenso(grid.Rows[grid.CurrentRow.Index].Cells[4].Value?.ToString()));
                frmCadClientes.txtRG.Text = grid.Rows[grid.CurrentRow.Index].Cells[5].Value?.ToString();
                frmCadClientes.mtxtCPF.Text = grid.Rows[grid.CurrentRow.Index].Cells[6].Value?.ToString();
                frmCadClientes.txtPais.Text = grid.Rows[grid.CurrentRow.Index].Cells[7].Value?.ToString();
                frmCadClientes.txtEstado.Text = grid.Rows[grid.CurrentRow.Index].Cells[8].Value?.ToString();
                frmCadClientes.txtCidade.Text = grid.Rows[grid.CurrentRow.Index].Cells[9].Value?.ToString();
                frmCadClientes.txtBairro.Text = grid.Rows[grid.CurrentRow.Index].Cells[10].Value?.ToString();
                frmCadClientes.txtCEP.Text = grid.Rows[grid.CurrentRow.Index].Cells[11].Value?.ToString();
                frmCadClientes.txtLogradouro.Text = grid.Rows[grid.CurrentRow.Index].Cells[12].Value?.ToString();
                frmCadClientes.txtComplemento.Text = grid.Rows[grid.CurrentRow.Index].Cells[13].Value?.ToString();
                frmCadClientes.txtNumero.Text = grid.Rows[grid.CurrentRow.Index].Cells[14].Value?.ToString();
                frmCadClientes.lblDataRegistro.Text = grid.Rows[grid.CurrentRow.Index].Cells[15].Value?.ToString();
                frmCadClientes.txtTelefone1.Text = ObterValorLinha(grid.Rows[grid.CurrentRow.Index].Cells[16].Value?.ToString());
                frmCadClientes.txtTelefone2.Text = ObterValorLinha(grid.Rows[grid.CurrentRow.Index].Cells[17].Value?.ToString());
                frmCadClientes.txtCelular1.Text = ObterValorLinha(grid.Rows[grid.CurrentRow.Index].Cells[18].Value?.ToString());
                frmCadClientes.txtCelular2.Text = ObterValorLinha(grid.Rows[grid.CurrentRow.Index].Cells[19].Value?.ToString());
                frmCadClientes.Show();

                this.Close();
            } catch (Exception ex) {
                _notificacoes.Nova(ex.Message, "Erro ao selecionar cliente");
            } finally {
                _notificacoes = null;
            }
        }

        private void AdicionarColunasTelefone() {
            grid.Columns.Add("colTelefone1", "Telefone 1");
            grid.Columns.Add("colTelefone2", "Telefone 2");
            grid.Columns.Add("colCelular1", "Celular 1");
            grid.Columns.Add("colCelular2", "Celular 2");
        }

        public void CarregarListaTelefone(List<string> listaTelefones, int linha) {
            grid.Rows[linha].Cells[16].Value = listaTelefones[0].ToString();
            grid.Rows[linha].Cells[17].Value = listaTelefones[1].ToString();
            grid.Rows[linha].Cells[18].Value = listaTelefones[2].ToString();
            grid.Rows[linha].Cells[19].Value = listaTelefones[3].ToString();
        }

        private string ObterValorLinha(string linha) {
            if (string.IsNullOrEmpty(linha)) return "";

            return linha;
        }

        private void CarregarLayoutGrid() {
            grid.Columns[1].Width = 200;
            grid.Columns[3].Visible = false;
            grid.Columns[4].Width = 60;
            grid.Columns[1].HeaderText = "Nome";

            AdicionarColunasTelefone();
        }

        private void frmBuscaClientes_FormClosed(object sender, FormClosedEventArgs e) {
            if (!ClienteSelecionado) {
                frmCadClientes frmCadClientes = new frmCadClientes();
                frmCadClientes.Show();
            }
        }
    }
}