using CadastroClientes.Aplicacao;
using CadastroClientes.Entidades;
using CadastroClientes.Enumerados;
using CadastroClientes.Forms;
using System;
using System.Collections.Generic;
using System.Data;
using System.Globalization;
using System.Linq;
using System.Windows.Forms;

namespace CadastrodeClientes
{
    public partial class frmCadClientes : Form
    {
        #region Propriedades    
        public int IdCliente { get; set; }

        private string _estadoCivil;
        public string EstadoCivil {
            get { return _estadoCivil; }
            set {
                _estadoCivil = value;
                SelecionarEstadoCivil();
            }
        }
        #endregion

        private string _sexo;

        public frmCadClientes() {
            InitializeComponent();
            lblBtnMocado.BackColor = this.BackColor;

#if (DEBUG)
            lblBtnMocado.Enabled = true;
#endif
        }

        private void frmCadClientes_Load(object sender, EventArgs e) {
            Util.CarregarComboEstadoCivil(comboEstadoCivil);
        }

        private void frmCadClientes_FormClosed(object sender, FormClosedEventArgs e) {
            Application.Exit();
        }

        private void txtBusca_KeyDown(object sender, KeyEventArgs e) {
            if (e.KeyCode == Keys.Enter) {
                if (!string.IsNullOrEmpty(txtBusca.Text)) BuscarClientes();
            }
        }

        private void txtBusca_Click(object sender, EventArgs e) {
            rbBusNome.Checked = true;
        }

        private void btnSalvar_Click(object sender, EventArgs e) {
            Clientes clientes = new Clientes();

            string estadoCivil = "";
            try {
                estadoCivil = ObterEstadoCivil();
            } catch {
                estadoCivil = comboEstadoCivil.Text;
            }

            _sexo = Util.ObterSexoSelecionado(this.gbSexo);
            if (Valido()) {
                Salvar();
                clientes.ExportarListParaCSV();
            }

            clientes = null;
        }

        private void btnExcluir_Click(object sender, EventArgs e) {
            Clientes clientes = new Clientes();

            if (IdCliente > 0) {
                DialogResult dialogResult = MessageBox.Show($"Deseja excluir o(a) cliente: {txtNome.Text}?", "Exclusão de Cliente", MessageBoxButtons.YesNo);
                if (dialogResult == DialogResult.Yes) {
                    clientes.Excluir(IdCliente);
                    Limpar();
                }
            }

            clientes = null;
        }

        private void btnAtualizar_Click(object sender, EventArgs e) {
            Clientes clientes = new Clientes();

            _sexo = Util.ObterSexoSelecionado(this.gbSexo);
            if (IdCliente > 0 && Valido()) clientes.Atualizar(Novo());

            clientes = null;
        }

        private void btnLimpar_Click(object sender, EventArgs e) {
            Limpar();
        }

        private void btnExportarCSV_Click(object sender, EventArgs e) {
            Clientes clientes = new Clientes();
            clientes.ExportarListParaCSV();

            clientes = null;
        }

        #region Metodos
        private void Salvar() {
            Clientes clientes = new Clientes();

            clientes.Incluir(Novo());
            Limpar();

            clientes = null;
        }

        private Cliente Novo() {
            Cliente cliente = new Cliente();
            List<string> listaTelefones = new List<string>();

            string estCivil = ObterEstadoCivil();

            cliente.Id = this.IdCliente;
            cliente.NomeCompleto = txtNome.Text;
            TimeZoneInfo horaBrasilia = TimeZoneInfo.FindSystemTimeZoneById("E. South America Standard Time");
            cliente.DataNascimento = TimeZoneInfo.ConvertTimeFromUtc(DateTime.Parse(mtxtDataNascimento.Text), horaBrasilia); 
            cliente.EstadoCivil = (int)Enum.Parse(typeof(eEstadoCivil), estCivil, true);
            cliente.Sexo = _sexo;
            cliente.RG = long.Parse(txtRG.Text);
            cliente.CPF = long.Parse(mtxtCPF.Text);
            cliente.Pais = txtPais.Text;
            cliente.Estado = txtEstado.Text;
            cliente.Cidade = txtCidade.Text;
            cliente.Bairro = txtBairro.Text;
            cliente.CEP = txtCEP.Text;
            cliente.Logradouro = txtLogradouro.Text;
            cliente.Complemento = txtComplemento.Text;
            cliente.Numero = Convert.ToInt32(txtNumero.Text);
            listaTelefones.Add(txtTelefone1?.Text);
            listaTelefones.Add(txtTelefone2?.Text);
            listaTelefones.Add(txtCelular1?.Text);
            listaTelefones.Add(txtCelular2?.Text);
            cliente.DataRegistro = Util.ObterDataAtual();
            cliente.listaTelefones = listaTelefones;

            return cliente;
        }

        private bool Valido() {
            Clientes clientes = new Clientes();

            return clientes.CadastroValido(txtNome.Text, _sexo, mtxtCPF.Text, txtPais.Text, txtEstado.Text, txtCidade.Text, txtBairro.Text, txtCEP.Text, txtLogradouro.Text, txtComplemento.Text, txtNumero.Text, txtCelular1.Text);
        }

        private void SelecionarEstadoCivil() {
            if (!string.IsNullOrEmpty(this.EstadoCivil)) comboEstadoCivil.Text = this.EstadoCivil;
        }

        private string ObterEstadoCivil() {
            if (comboEstadoCivil.SelectedItem == null) {
                return comboEstadoCivil.Text;
            } else {
                return comboEstadoCivil.SelectedItem.ToString();
            }
        }

        private void BuscarClientes() {
            Clientes clientes = new Clientes();
            List<Cliente> listaClientes = new List<Cliente>();

            listaClientes = clientes.Todos();
            if (rbBusNome.Checked) {
                var listaClientesFiltro = listaClientes.Where(c => c.NomeCompleto.Contains(txtBusca.Text)).ToList();

                this.Hide();
                frmBuscaClientes frmBuscaClientes = new frmBuscaClientes();
                frmBuscaClientes.RefInstanciaForm = this;
                frmBuscaClientes.grid.DataSource = listaClientesFiltro;
                frmBuscaClientes.Show();

                int nlinhas = 0;
                foreach (var cliente in listaClientesFiltro) {
                    frmBuscaClientes.CarregarListaTelefone(cliente.listaTelefones, nlinhas);
                    nlinhas = +1;
                }
            }

            clientes = null;
            listaClientes = null;
        }

        private void Limpar() {
            this.EstadoCivil = "";
            txtNome.Clear();
            mtxtDataNascimento.Clear();
            comboEstadoCivil.Text = "";
            Util.LimparCampoSexo(gbSexo);
            txtRG.Clear();
            mtxtCPF.Clear();
            txtPais.Clear();
            txtEstado.Clear();
            txtCidade.Clear();
            txtBairro.Clear();
            txtCEP.Clear();
            txtLogradouro.Clear();
            txtComplemento.Clear();
            txtNumero.Clear();
            txtTelefone1.Clear();
            txtTelefone2.Clear();
            txtCelular1.Clear();
            txtCelular2.Clear();
        }

        #endregion

        //MOCK
        private void lblBtnMocado_Click(object sender, EventArgs e) {
            Util.AbrirForm<frmMockClientes>();
        }
    }
}