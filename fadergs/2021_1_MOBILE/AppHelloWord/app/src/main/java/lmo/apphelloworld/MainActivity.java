package lmo.apphelloworld;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class MainActivity extends AppCompatActivity {

    private EditText etValor;
    private Button btnCalcular;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        etValor = findViewById(R.id.etValor);
        btnCalcular = findViewById(R.id.btnCalcular);

        btnCalcular.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                calcular();
            }
        });
    }

    private void calcular(){
        String valor = etValor.getText().toString();
        if( !valor.isEmpty() ){
            double numero = Double.valueOf(valor);
            double resultado = numero * 2;

            AlertDialog.Builder alerta = new AlertDialog.Builder(MainActivity.this);

            alerta.setTitle("Resultado");
            alerta.setMessage("Valor" + " X 2: " + resultado);
            //alerta.setMessage(String.valueOf(resultado));
            alerta.setPositiveButton("OK", null);
            alerta.show();
        }
    }
}