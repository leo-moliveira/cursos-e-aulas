namespace CadastroClientes.Forms
{
    partial class frmMockClientes
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing) {
            if (disposing && (components != null)) {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent() {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(frmMockClientes));
            this.comboClienteMocados = new System.Windows.Forms.ComboBox();
            this.SuspendLayout();
            // 
            // comboClienteMocados
            // 
            this.comboClienteMocados.FormattingEnabled = true;
            this.comboClienteMocados.Location = new System.Drawing.Point(12, 29);
            this.comboClienteMocados.Name = "comboClienteMocados";
            this.comboClienteMocados.Size = new System.Drawing.Size(225, 21);
            this.comboClienteMocados.TabIndex = 0;
            this.comboClienteMocados.SelectionChangeCommitted += new System.EventHandler(this.comboClienteMocados_SelectionChangeCommitted);
            // 
            // frmMockClientes
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(249, 62);
            this.Controls.Add(this.comboClienteMocados);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.MaximizeBox = false;
            this.Name = "frmMockClientes";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Clientes Mock";
            this.Load += new System.EventHandler(this.frmMockClientes_Load);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.ComboBox comboClienteMocados;
    }
}