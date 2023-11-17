namespace CadastrodeClientes
{
    partial class frmCadClientes
    {
        /// <summary>
        /// Variável de designer necessária.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpar os recursos que estão sendo usados.
        /// </summary>
        /// <param name="disposing">true se for necessário descartar os recursos gerenciados; caso contrário, false.</param>
        protected override void Dispose(bool disposing) {
            if (disposing && (components != null)) {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código gerado pelo Windows Form Designer

        /// <summary>
        /// Método necessário para suporte ao Designer - não modifique 
        /// o conteúdo deste método com o editor de código.
        /// </summary>
        private void InitializeComponent() {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(frmCadClientes));
            this.label1 = new System.Windows.Forms.Label();
            this.txtNome = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.txtPais = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.txtRG = new System.Windows.Forms.TextBox();
            this.label6 = new System.Windows.Forms.Label();
            this.gbSexo = new System.Windows.Forms.GroupBox();
            this.rbO = new System.Windows.Forms.RadioButton();
            this.rbM = new System.Windows.Forms.RadioButton();
            this.rbF = new System.Windows.Forms.RadioButton();
            this.mtxtCPF = new System.Windows.Forms.MaskedTextBox();
            this.comboEstadoCivil = new System.Windows.Forms.ComboBox();
            this.txtEstado = new System.Windows.Forms.TextBox();
            this.label7 = new System.Windows.Forms.Label();
            this.txtCidade = new System.Windows.Forms.TextBox();
            this.label8 = new System.Windows.Forms.Label();
            this.mtxtDataNascimento = new System.Windows.Forms.MaskedTextBox();
            this.txtCEP = new System.Windows.Forms.TextBox();
            this.label9 = new System.Windows.Forms.Label();
            this.txtLogradouro = new System.Windows.Forms.TextBox();
            this.label10 = new System.Windows.Forms.Label();
            this.txtNumero = new System.Windows.Forms.TextBox();
            this.label11 = new System.Windows.Forms.Label();
            this.txtComplemento = new System.Windows.Forms.TextBox();
            this.label12 = new System.Windows.Forms.Label();
            this.txtTelefone1 = new System.Windows.Forms.TextBox();
            this.label13 = new System.Windows.Forms.Label();
            this.txtTelefone2 = new System.Windows.Forms.TextBox();
            this.label14 = new System.Windows.Forms.Label();
            this.txtCelular2 = new System.Windows.Forms.TextBox();
            this.label15 = new System.Windows.Forms.Label();
            this.txtCelular1 = new System.Windows.Forms.TextBox();
            this.label16 = new System.Windows.Forms.Label();
            this.btnSalvar = new System.Windows.Forms.Button();
            this.btnAtualizar = new System.Windows.Forms.Button();
            this.btnExcluir = new System.Windows.Forms.Button();
            this.btnExportarCSV = new System.Windows.Forms.Button();
            this.lblBtnMocado = new System.Windows.Forms.Label();
            this.txtBairro = new System.Windows.Forms.TextBox();
            this.label17 = new System.Windows.Forms.Label();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.rbBusNome = new System.Windows.Forms.RadioButton();
            this.txtBusca = new System.Windows.Forms.TextBox();
            this.btnLimpar = new System.Windows.Forms.Button();
            this.label18 = new System.Windows.Forms.Label();
            this.lblDataRegistro = new System.Windows.Forms.Label();
            this.gbSexo.SuspendLayout();
            this.groupBox1.SuspendLayout();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.Location = new System.Drawing.Point(30, 70);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(95, 13);
            this.label1.TabIndex = 0;
            this.label1.Text = "* Nome:";
            this.label1.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtNome
            // 
            this.txtNome.Location = new System.Drawing.Point(131, 67);
            this.txtNome.Name = "txtNome";
            this.txtNome.Size = new System.Drawing.Size(368, 21);
            this.txtNome.TabIndex = 10;
            // 
            // label2
            // 
            this.label2.Location = new System.Drawing.Point(30, 97);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(95, 13);
            this.label2.TabIndex = 2;
            this.label2.Text = "Data Nasc.:";
            this.label2.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // label3
            // 
            this.label3.Location = new System.Drawing.Point(30, 124);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(95, 13);
            this.label3.TabIndex = 4;
            this.label3.Text = "Estado Civil:";
            this.label3.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtPais
            // 
            this.txtPais.Location = new System.Drawing.Point(131, 202);
            this.txtPais.Name = "txtPais";
            this.txtPais.Size = new System.Drawing.Size(219, 21);
            this.txtPais.TabIndex = 19;
            // 
            // label4
            // 
            this.label4.Location = new System.Drawing.Point(30, 205);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(95, 13);
            this.label4.TabIndex = 10;
            this.label4.Text = "* País:";
            this.label4.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // label5
            // 
            this.label5.Location = new System.Drawing.Point(30, 178);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(95, 13);
            this.label5.TabIndex = 8;
            this.label5.Text = "* CPF:";
            this.label5.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtRG
            // 
            this.txtRG.Location = new System.Drawing.Point(131, 148);
            this.txtRG.Name = "txtRG";
            this.txtRG.Size = new System.Drawing.Size(113, 21);
            this.txtRG.TabIndex = 17;
            // 
            // label6
            // 
            this.label6.Location = new System.Drawing.Point(30, 151);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(95, 13);
            this.label6.TabIndex = 6;
            this.label6.Text = "RG:";
            this.label6.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // gbSexo
            // 
            this.gbSexo.Controls.Add(this.rbO);
            this.gbSexo.Controls.Add(this.rbM);
            this.gbSexo.Controls.Add(this.rbF);
            this.gbSexo.Location = new System.Drawing.Point(515, 67);
            this.gbSexo.Name = "gbSexo";
            this.gbSexo.Size = new System.Drawing.Size(115, 92);
            this.gbSexo.TabIndex = 11;
            this.gbSexo.TabStop = false;
            this.gbSexo.Text = "* Sexo:";
            // 
            // rbO
            // 
            this.rbO.AutoSize = true;
            this.rbO.Location = new System.Drawing.Point(19, 68);
            this.rbO.Name = "rbO";
            this.rbO.Size = new System.Drawing.Size(57, 17);
            this.rbO.TabIndex = 14;
            this.rbO.TabStop = true;
            this.rbO.Text = "Outro";
            this.rbO.UseVisualStyleBackColor = true;
            // 
            // rbM
            // 
            this.rbM.AutoSize = true;
            this.rbM.Location = new System.Drawing.Point(19, 44);
            this.rbM.Name = "rbM";
            this.rbM.Size = new System.Drawing.Size(80, 17);
            this.rbM.TabIndex = 13;
            this.rbM.TabStop = true;
            this.rbM.Text = "Masculino";
            this.rbM.UseVisualStyleBackColor = true;
            // 
            // rbF
            // 
            this.rbF.AutoSize = true;
            this.rbF.Location = new System.Drawing.Point(19, 17);
            this.rbF.Name = "rbF";
            this.rbF.Size = new System.Drawing.Size(76, 17);
            this.rbF.TabIndex = 12;
            this.rbF.TabStop = true;
            this.rbF.Text = "Feminino";
            this.rbF.UseVisualStyleBackColor = true;
            // 
            // mtxtCPF
            // 
            this.mtxtCPF.Location = new System.Drawing.Point(131, 175);
            this.mtxtCPF.Mask = "###.###.###-##";
            this.mtxtCPF.Name = "mtxtCPF";
            this.mtxtCPF.Size = new System.Drawing.Size(113, 21);
            this.mtxtCPF.TabIndex = 18;
            this.mtxtCPF.TextMaskFormat = System.Windows.Forms.MaskFormat.ExcludePromptAndLiterals;
            // 
            // comboEstadoCivil
            // 
            this.comboEstadoCivil.FormattingEnabled = true;
            this.comboEstadoCivil.Location = new System.Drawing.Point(131, 121);
            this.comboEstadoCivil.Name = "comboEstadoCivil";
            this.comboEstadoCivil.Size = new System.Drawing.Size(219, 21);
            this.comboEstadoCivil.TabIndex = 16;
            // 
            // txtEstado
            // 
            this.txtEstado.Location = new System.Drawing.Point(131, 229);
            this.txtEstado.Name = "txtEstado";
            this.txtEstado.Size = new System.Drawing.Size(219, 21);
            this.txtEstado.TabIndex = 20;
            // 
            // label7
            // 
            this.label7.Location = new System.Drawing.Point(30, 232);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(95, 13);
            this.label7.TabIndex = 15;
            this.label7.Text = "* Estado:";
            this.label7.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtCidade
            // 
            this.txtCidade.Location = new System.Drawing.Point(131, 256);
            this.txtCidade.Name = "txtCidade";
            this.txtCidade.Size = new System.Drawing.Size(219, 21);
            this.txtCidade.TabIndex = 21;
            // 
            // label8
            // 
            this.label8.Location = new System.Drawing.Point(30, 259);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(95, 13);
            this.label8.TabIndex = 17;
            this.label8.Text = "* Cidade:";
            this.label8.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // mtxtDataNascimento
            // 
            this.mtxtDataNascimento.Location = new System.Drawing.Point(131, 94);
            this.mtxtDataNascimento.Mask = "00/00/0000";
            this.mtxtDataNascimento.Name = "mtxtDataNascimento";
            this.mtxtDataNascimento.Size = new System.Drawing.Size(113, 21);
            this.mtxtDataNascimento.TabIndex = 15;
            this.mtxtDataNascimento.ValidatingType = typeof(System.DateTime);
            // 
            // txtCEP
            // 
            this.txtCEP.Location = new System.Drawing.Point(131, 310);
            this.txtCEP.Name = "txtCEP";
            this.txtCEP.Size = new System.Drawing.Size(113, 21);
            this.txtCEP.TabIndex = 23;
            // 
            // label9
            // 
            this.label9.Location = new System.Drawing.Point(30, 313);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(95, 13);
            this.label9.TabIndex = 20;
            this.label9.Text = "* CEP:";
            this.label9.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtLogradouro
            // 
            this.txtLogradouro.Location = new System.Drawing.Point(131, 337);
            this.txtLogradouro.Name = "txtLogradouro";
            this.txtLogradouro.Size = new System.Drawing.Size(368, 21);
            this.txtLogradouro.TabIndex = 24;
            // 
            // label10
            // 
            this.label10.Location = new System.Drawing.Point(30, 340);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(95, 13);
            this.label10.TabIndex = 22;
            this.label10.Text = "* Logradouro:";
            this.label10.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtNumero
            // 
            this.txtNumero.Location = new System.Drawing.Point(423, 364);
            this.txtNumero.Name = "txtNumero";
            this.txtNumero.Size = new System.Drawing.Size(76, 21);
            this.txtNumero.TabIndex = 26;
            // 
            // label11
            // 
            this.label11.Location = new System.Drawing.Point(363, 367);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(54, 13);
            this.label11.TabIndex = 24;
            this.label11.Text = "* Nº:";
            this.label11.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtComplemento
            // 
            this.txtComplemento.Location = new System.Drawing.Point(131, 364);
            this.txtComplemento.Name = "txtComplemento";
            this.txtComplemento.Size = new System.Drawing.Size(219, 21);
            this.txtComplemento.TabIndex = 25;
            // 
            // label12
            // 
            this.label12.Location = new System.Drawing.Point(12, 367);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(113, 13);
            this.label12.TabIndex = 26;
            this.label12.Text = "* Complemento:";
            this.label12.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtTelefone1
            // 
            this.txtTelefone1.Location = new System.Drawing.Point(131, 391);
            this.txtTelefone1.Name = "txtTelefone1";
            this.txtTelefone1.Size = new System.Drawing.Size(113, 21);
            this.txtTelefone1.TabIndex = 27;
            // 
            // label13
            // 
            this.label13.Location = new System.Drawing.Point(30, 394);
            this.label13.Name = "label13";
            this.label13.Size = new System.Drawing.Size(95, 13);
            this.label13.TabIndex = 28;
            this.label13.Text = "Tel. Fixo 1:";
            this.label13.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtTelefone2
            // 
            this.txtTelefone2.Location = new System.Drawing.Point(386, 391);
            this.txtTelefone2.Name = "txtTelefone2";
            this.txtTelefone2.Size = new System.Drawing.Size(113, 21);
            this.txtTelefone2.TabIndex = 28;
            // 
            // label14
            // 
            this.label14.Location = new System.Drawing.Point(285, 394);
            this.label14.Name = "label14";
            this.label14.Size = new System.Drawing.Size(95, 13);
            this.label14.TabIndex = 30;
            this.label14.Text = "Tel. Fixo 2:";
            this.label14.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtCelular2
            // 
            this.txtCelular2.Location = new System.Drawing.Point(386, 421);
            this.txtCelular2.Name = "txtCelular2";
            this.txtCelular2.Size = new System.Drawing.Size(113, 21);
            this.txtCelular2.TabIndex = 30;
            // 
            // label15
            // 
            this.label15.Location = new System.Drawing.Point(285, 424);
            this.label15.Name = "label15";
            this.label15.Size = new System.Drawing.Size(95, 13);
            this.label15.TabIndex = 34;
            this.label15.Text = "Celular 2:";
            this.label15.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // txtCelular1
            // 
            this.txtCelular1.Location = new System.Drawing.Point(131, 418);
            this.txtCelular1.Name = "txtCelular1";
            this.txtCelular1.Size = new System.Drawing.Size(113, 21);
            this.txtCelular1.TabIndex = 29;
            // 
            // label16
            // 
            this.label16.Location = new System.Drawing.Point(30, 421);
            this.label16.Name = "label16";
            this.label16.Size = new System.Drawing.Size(95, 13);
            this.label16.TabIndex = 32;
            this.label16.Text = "* Celular 1:";
            this.label16.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // btnSalvar
            // 
            this.btnSalvar.Location = new System.Drawing.Point(27, 481);
            this.btnSalvar.Name = "btnSalvar";
            this.btnSalvar.Size = new System.Drawing.Size(92, 27);
            this.btnSalvar.TabIndex = 30;
            this.btnSalvar.Text = "Salvar";
            this.btnSalvar.UseVisualStyleBackColor = true;
            this.btnSalvar.Click += new System.EventHandler(this.btnSalvar_Click);
            // 
            // btnAtualizar
            // 
            this.btnAtualizar.Location = new System.Drawing.Point(125, 481);
            this.btnAtualizar.Name = "btnAtualizar";
            this.btnAtualizar.Size = new System.Drawing.Size(93, 27);
            this.btnAtualizar.TabIndex = 40;
            this.btnAtualizar.Text = "Atualizar";
            this.btnAtualizar.UseVisualStyleBackColor = true;
            this.btnAtualizar.Click += new System.EventHandler(this.btnAtualizar_Click);
            // 
            // btnExcluir
            // 
            this.btnExcluir.Location = new System.Drawing.Point(225, 481);
            this.btnExcluir.Name = "btnExcluir";
            this.btnExcluir.Size = new System.Drawing.Size(93, 27);
            this.btnExcluir.TabIndex = 50;
            this.btnExcluir.Text = "Excluir";
            this.btnExcluir.UseVisualStyleBackColor = true;
            this.btnExcluir.Click += new System.EventHandler(this.btnExcluir_Click);
            // 
            // btnExportarCSV
            // 
            this.btnExportarCSV.Location = new System.Drawing.Point(423, 481);
            this.btnExportarCSV.Name = "btnExportarCSV";
            this.btnExportarCSV.Size = new System.Drawing.Size(112, 27);
            this.btnExportarCSV.TabIndex = 70;
            this.btnExportarCSV.Text = "Exportar .CSV";
            this.btnExportarCSV.UseVisualStyleBackColor = true;
            this.btnExportarCSV.Click += new System.EventHandler(this.btnExportarCSV_Click);
            // 
            // lblBtnMocado
            // 
            this.lblBtnMocado.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(128)))));
            this.lblBtnMocado.Enabled = false;
            this.lblBtnMocado.FlatStyle = System.Windows.Forms.FlatStyle.System;
            this.lblBtnMocado.Location = new System.Drawing.Point(568, 470);
            this.lblBtnMocado.Name = "lblBtnMocado";
            this.lblBtnMocado.Size = new System.Drawing.Size(76, 49);
            this.lblBtnMocado.TabIndex = 61;
            this.lblBtnMocado.Click += new System.EventHandler(this.lblBtnMocado_Click);
            // 
            // txtBairro
            // 
            this.txtBairro.Location = new System.Drawing.Point(132, 283);
            this.txtBairro.MaxLength = 28;
            this.txtBairro.Name = "txtBairro";
            this.txtBairro.Size = new System.Drawing.Size(218, 21);
            this.txtBairro.TabIndex = 22;
            // 
            // label17
            // 
            this.label17.Location = new System.Drawing.Point(31, 286);
            this.label17.Name = "label17";
            this.label17.Size = new System.Drawing.Size(95, 13);
            this.label17.TabIndex = 62;
            this.label17.Text = "* Bairro:";
            this.label17.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.rbBusNome);
            this.groupBox1.Controls.Add(this.txtBusca);
            this.groupBox1.Location = new System.Drawing.Point(34, 1);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(465, 51);
            this.groupBox1.TabIndex = 63;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Busca:";
            // 
            // rbBusNome
            // 
            this.rbBusNome.AutoSize = true;
            this.rbBusNome.Location = new System.Drawing.Point(378, 21);
            this.rbBusNome.Name = "rbBusNome";
            this.rbBusNome.Size = new System.Drawing.Size(58, 17);
            this.rbBusNome.TabIndex = 13;
            this.rbBusNome.TabStop = true;
            this.rbBusNome.Text = "Nome";
            this.rbBusNome.UseVisualStyleBackColor = true;
            // 
            // txtBusca
            // 
            this.txtBusca.Location = new System.Drawing.Point(20, 20);
            this.txtBusca.Name = "txtBusca";
            this.txtBusca.Size = new System.Drawing.Size(340, 21);
            this.txtBusca.TabIndex = 11;
            this.txtBusca.Click += new System.EventHandler(this.txtBusca_Click);
            this.txtBusca.KeyDown += new System.Windows.Forms.KeyEventHandler(this.txtBusca_KeyDown);
            // 
            // btnLimpar
            // 
            this.btnLimpar.Location = new System.Drawing.Point(324, 481);
            this.btnLimpar.Name = "btnLimpar";
            this.btnLimpar.Size = new System.Drawing.Size(93, 27);
            this.btnLimpar.TabIndex = 60;
            this.btnLimpar.Text = "Limpar";
            this.btnLimpar.UseVisualStyleBackColor = true;
            this.btnLimpar.Click += new System.EventHandler(this.btnLimpar_Click);
            // 
            // label18
            // 
            this.label18.Location = new System.Drawing.Point(28, 448);
            this.label18.Name = "label18";
            this.label18.Size = new System.Drawing.Size(95, 13);
            this.label18.TabIndex = 71;
            this.label18.Text = "Data Registro:";
            this.label18.TextAlign = System.Drawing.ContentAlignment.TopRight;
            // 
            // lblDataRegistro
            // 
            this.lblDataRegistro.Location = new System.Drawing.Point(129, 448);
            this.lblDataRegistro.Name = "lblDataRegistro";
            this.lblDataRegistro.Size = new System.Drawing.Size(95, 13);
            this.lblDataRegistro.TabIndex = 72;
            // 
            // frmCadClientes
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(7F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(642, 517);
            this.Controls.Add(this.lblDataRegistro);
            this.Controls.Add(this.label18);
            this.Controls.Add(this.btnLimpar);
            this.Controls.Add(this.groupBox1);
            this.Controls.Add(this.txtBairro);
            this.Controls.Add(this.label17);
            this.Controls.Add(this.lblBtnMocado);
            this.Controls.Add(this.btnExportarCSV);
            this.Controls.Add(this.btnExcluir);
            this.Controls.Add(this.btnAtualizar);
            this.Controls.Add(this.btnSalvar);
            this.Controls.Add(this.txtCelular2);
            this.Controls.Add(this.label15);
            this.Controls.Add(this.txtCelular1);
            this.Controls.Add(this.label16);
            this.Controls.Add(this.txtTelefone2);
            this.Controls.Add(this.label14);
            this.Controls.Add(this.txtTelefone1);
            this.Controls.Add(this.label13);
            this.Controls.Add(this.txtComplemento);
            this.Controls.Add(this.label12);
            this.Controls.Add(this.txtNumero);
            this.Controls.Add(this.label11);
            this.Controls.Add(this.txtLogradouro);
            this.Controls.Add(this.label10);
            this.Controls.Add(this.txtCEP);
            this.Controls.Add(this.label9);
            this.Controls.Add(this.mtxtDataNascimento);
            this.Controls.Add(this.txtCidade);
            this.Controls.Add(this.label8);
            this.Controls.Add(this.txtEstado);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.comboEstadoCivil);
            this.Controls.Add(this.mtxtCPF);
            this.Controls.Add(this.gbSexo);
            this.Controls.Add(this.txtPais);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.txtRG);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.txtNome);
            this.Controls.Add(this.label1);
            this.Font = new System.Drawing.Font("Verdana", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.MaximizeBox = false;
            this.Name = "frmCadClientes";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Arquitetura de Software - Hotelaria - Cadastro de Clientes";
            this.FormClosed += new System.Windows.Forms.FormClosedEventHandler(this.frmCadClientes_FormClosed);
            this.Load += new System.EventHandler(this.frmCadClientes_Load);
            this.gbSexo.ResumeLayout(false);
            this.gbSexo.PerformLayout();
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label1;
        public System.Windows.Forms.TextBox txtNome;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
        public System.Windows.Forms.TextBox txtPais;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label5;
        public System.Windows.Forms.TextBox txtRG;
        private System.Windows.Forms.Label label6;
        public System.Windows.Forms.GroupBox gbSexo;
        public System.Windows.Forms.RadioButton rbO;
        public System.Windows.Forms.RadioButton rbM;
        public System.Windows.Forms.RadioButton rbF;
        public System.Windows.Forms.MaskedTextBox mtxtCPF;
        public System.Windows.Forms.ComboBox comboEstadoCivil;
        public System.Windows.Forms.TextBox txtEstado;
        private System.Windows.Forms.Label label7;
        public System.Windows.Forms.TextBox txtCidade;
        private System.Windows.Forms.Label label8;
        public System.Windows.Forms.MaskedTextBox mtxtDataNascimento;
        public System.Windows.Forms.TextBox txtCEP;
        private System.Windows.Forms.Label label9;
        public System.Windows.Forms.TextBox txtLogradouro;
        private System.Windows.Forms.Label label10;
        public System.Windows.Forms.TextBox txtNumero;
        private System.Windows.Forms.Label label11;
        public System.Windows.Forms.TextBox txtComplemento;
        private System.Windows.Forms.Label label12;
        public System.Windows.Forms.TextBox txtTelefone1;
        private System.Windows.Forms.Label label13;
        public System.Windows.Forms.TextBox txtTelefone2;
        private System.Windows.Forms.Label label14;
        public System.Windows.Forms.TextBox txtCelular2;
        private System.Windows.Forms.Label label15;
        public System.Windows.Forms.TextBox txtCelular1;
        private System.Windows.Forms.Label label16;
        private System.Windows.Forms.Button btnSalvar;
        private System.Windows.Forms.Button btnAtualizar;
        private System.Windows.Forms.Button btnExcluir;
        private System.Windows.Forms.Button btnExportarCSV;
        private System.Windows.Forms.Label lblBtnMocado;
        public System.Windows.Forms.TextBox txtBairro;
        private System.Windows.Forms.Label label17;
        private System.Windows.Forms.GroupBox groupBox1;
        public System.Windows.Forms.RadioButton rbBusNome;
        public System.Windows.Forms.TextBox txtBusca;
        private System.Windows.Forms.Button btnLimpar;
        private System.Windows.Forms.Label label18;
        public System.Windows.Forms.Label lblDataRegistro;
    }
}

