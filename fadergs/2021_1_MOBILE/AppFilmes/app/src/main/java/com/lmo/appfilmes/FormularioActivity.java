package com.lmo.appfilmes;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

public class FormularioActivity extends AppCompatActivity {

    private EditText etNome;
    private Spinner spAno;
    private Button btnSalvar;
    private String acao;
    private Filme filme;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_formulario);

        etNome = findViewById(R.id.etNome);
        spAno = findViewById(R.id.spAno);
        btnSalvar = findViewById(R.id.btn_salvar);
        acao = getIntent().getStringExtra("acao");

        if(acao.equals("editar")){
            carregarFormulario();
        }else{}

        btnSalvar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                salvar();
            }
        });
    }

    private void carregarFormulario(){
        int idFilme = getIntent().getIntExtra("id",0);
        if(idFilme != 0){
            filme = FilmeDAO.getFilme(idFilme,this);
            etNome.setText(filme.nome);
            String[] arrayAno = getResources().getStringArray(R.array.arrayAno);
            for(int i = 1; i < arrayAno.length; i++){
                if(Integer.valueOf(arrayAno[i]) == filme.getAno()){
                    spAno.setSelection(i);
                    break;
                }else{
                    continue;
                }
            }
        }else{}
    }

    private void salvar(){
        if(spAno.getSelectedItemPosition() == 0 || etNome.getText().toString().isEmpty()) {
            Toast.makeText(this, "Voce deve selecionar um Ano", Toast.LENGTH_LONG).show();
        }else{
            if (acao.equals("novo")) {
                filme = new Filme();
            }else{}

            filme.nome = etNome.getText().toString();
            filme.setAno(Integer.valueOf(spAno.getSelectedItem().toString()));
            if(acao.equals("editar")){
                FilmeDAO.editar(filme,this);
                finish();
            }else{
                FilmeDAO.inserir(filme,this);
                etNome.setText("");
                spAno.setSelection(0);
            }
        }
    }
}