package com.example.med.log_qr;
import com.example.med.log_qr.FetchData;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextUtils;
import android.text.TextWatcher;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends Activity {

    public static String value;
    Button button;
    public EditText editPin;
    public static String data;

    public void checkData() {
        value = editPin.getText().toString();
        FetchData proc = new FetchData();
        proc.execute();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_main);






        button = (Button) findViewById(R.id.button);
        editPin = (EditText) findViewById(R.id.editPin);

        button.performClick();

        editPin.addTextChangedListener(new TextWatcher() {

            @Override
            public void afterTextChanged(Editable s) {}

            @Override
            public void beforeTextChanged(CharSequence s, int start,
                                          int count, int after) {
            }

            @Override
            public void onTextChanged(CharSequence s, int start,
                                      int before, int count) {
                if(s.length() > 3)
                    button.callOnClick();
            }
        });

        button.setOnClickListener(new OnClickListener() {

            @Override
            public void onClick(View v) {
                checkData();

                if(!TextUtils.isEmpty(editPin.getText().toString())){
                    if(!TextUtils.isEmpty(data)){
                        if(editPin.getText().toString().equals(data)){
                            //Toast.makeText(getApplicationContext(), "Code pin valide : "+data, Toast.LENGTH_LONG).show();
                            Intent intent = new Intent(MainActivity.this, ScanActivity.class);
                            intent.putExtra("tid", data);
                            startActivity(intent); // startActivity allow you to move
                            Toast.makeText(getApplicationContext(), "vous entrerez avec ce code pin : "+data, Toast.LENGTH_LONG).show();

                        }else{

                                //Toast.makeText(getApplicationContext(), "Code pin invalid" , Toast.LENGTH_LONG).show();

                        }
                    }else{
                        //Toast.makeText(getApplicationContext(), "Erreur connection", Toast.LENGTH_LONG).show();
                    }

                }else{
                    Toast.makeText(getApplicationContext(), "Entrer le code pin s'il vous plaît", Toast.LENGTH_LONG).show();

                }


            }
        });
    }

}