package br.com.livraria.app;

import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;

import com.google.gson.Gson;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import br.com.livraria.app.model.Livro;

/**
 * A placeholder fragment containing a simple view.
 */
public class MainActivityFragment extends Fragment {

    ListView listview;
    List<Livro> lstLivro;
    ProgressDialog progress;
    Livro [] livro;

    public MainActivityFragment() {
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View view = inflater.inflate(R.layout.fragment_main, container, false);

        new ObterDadosAPI().execute();

        listview = (ListView) view.findViewById(R.id.list_view_livro);

        lstLivro = new ArrayList<>();

        return view;
    }

    private class ObterDadosAPI extends  AsyncTask<Void, Void, String>{

        @Override
        protected  void onPostExecute(String string){
            super.onPostExecute(string);

            progress.hide(); /*BARRA DE PROGRESSO*/

            if(string != null){
                Gson gson = new Gson();

                livro = gson.fromJson(string , Livro[].class);

                List<HashMap<String, Object>> lstMapeada = new ArrayList<>();

                for (Livro item : livro)
                {
                    HashMap<String, Object> itemMap = new HashMap<>();

                    itemMap.put("cod", item.getCod_livro());
                    itemMap.put("nome", item.getNome_livro());
                    itemMap.put("desc", item.getDesc_livro());
                    itemMap.put("preco", item.getPreco_livro());
                    itemMap.put("autor", item.getNome_autor());

                    lstMapeada.add(itemMap);

                    String [] colunas = new String[]{"cod","nome","desc","preco","autor" };

                    int[] objetos = new int[]{

                    };

                }

            }
        }




        @Override
        protected String doInBackground(Void... params) {

            // These two need to be declared outside the try/catch
            // so that they can be closed in the finally block.
            HttpURLConnection urlConnection = null;
            BufferedReader reader = null;

            // Will contain the raw JSON response as a string.
            String stringJson = null;

            try {
                // Construct the URL for the OpenWeatherMap query
                // Possible parameters are avaiable at OWM's forecast API page, at
                // http://openweathermap.org/API#forecast
                //URL url = new URL("http://developers.agenciaideias.com.br/tempo/json/s%C3%A3o%20paulo-SP");

                URL url = new URL("http://127.0.0.1/diegosena/buscalivro.php");

                // Create the request to OpenWeatherMap, and open the connection
                urlConnection = (HttpURLConnection) url.openConnection();
                urlConnection.setRequestMethod("GET");
                urlConnection.connect();

                // Read the input stream into a String
                InputStream inputStream = urlConnection.getInputStream();
                StringBuffer buffer = new StringBuffer();
                if (inputStream == null) {
                    // Nothing to do.
                    stringJson = null;
                }
                reader = new BufferedReader(new InputStreamReader(inputStream));

                String line;
                while ((line = reader.readLine()) != null) {
                    // Since it's JSON, adding a newline isn't necessary (it won't affect parsing)
                    // But it does make debugging a *lot* easier if you print out the completed
                    // buffer for debugging.
                    buffer.append(line + "\n");
                }
                if (buffer.length() == 0) {
                    // Stream was empty.  No point in parsing.
                    stringJson = null;
                }
                stringJson = buffer.toString();
            } catch (IOException e) {
                Log.e("PlaceholderFragment", "Error ", e);
                // If the code didn't successfully get the weather data, there's no point in attemping
                // to parse it.
                stringJson = null;
            } finally {
                if (urlConnection != null) {
                    urlConnection.disconnect();
                }
                if (reader != null) {
                    try {
                        reader.close();
                    } catch (final IOException e) {
                        Log.e("PlaceholderFragment", "Error closing stream", e);
                    }
                }
            }
            return stringJson;
        }
    }
}
