package com.example.med.log_qr;
import com.example.med.log_qr.MainActivity;
import android.os.AsyncTask;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

/**
 * Created by med on 15-May-18.
 */

public class FetchData extends AsyncTask<Void,Void,Void> {
    String data ="";
    String  value = MainActivity.value ;

    @Override
    protected Void doInBackground(Void... voids) {
    try {
        //String value= editPin.getText().toString();
        //int pinResult=Integer.parseInt(value);

        URL url = new URL ("http://192.168.43.205/pointage/api/public/api/teacher/"+value);
        HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
        InputStream inputStream = httpURLConnection.getInputStream();
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
        String line = "";
        while (line!= null){
            line = bufferedReader.readLine();
            data = data+line;
        }

        JSONObject JO = new JSONObject(data);
        data = (String) JO.get("teacher_id");
        MainActivity.data = data;


    }catch (MalformedURLException e){
        e.printStackTrace();
    } catch (IOException e) {
        e.printStackTrace();
    } catch (JSONException e) {
        data = "";
       // e.printStackTrace();
    }

        return null;
    }

    @Override
    protected void onPostExecute(Void aVoid) {
        super.onPostExecute(aVoid);
    }
}
