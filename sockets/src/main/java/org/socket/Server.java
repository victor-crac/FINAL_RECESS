package org.socket;
import java.io.*;
import java.net.*;
import java.util.HashMap;
import java.util.List;

// Server class
public class Server {
    public static void main(String[] args) {
        ServerSocket server = null;

        try {

            // server is listening on port 1234
            server = new ServerSocket(1234);
            server.setReuseAddress(true);

            // running infinite loop for getting
            // client request
            while (true) {

                // socket object to receive incoming client
                // requests
                Socket client = server.accept();

                // Displaying that new client is connected
                // to server
                System.out.println("New client connected" + client.getInetAddress().getHostAddress());

                // create a new thread object
                ClientHandler clientSock = new ClientHandler(client);

                // This thread will handle the client
                // separately
                new Thread(clientSock).start();
            }
        }
        catch (IOException e) {
            e.printStackTrace();
        }
        finally {
            if (server != null) {
                try {
                    server.close();
                }
                catch (IOException e) {
                    e.printStackTrace();
                }
            }
        }
    }

    // ClientHandler class
    private static class ClientHandler implements Runnable {
        private final Socket clientSocket;

        // Constructor
        public ClientHandler(Socket socket)
        {
            this.clientSocket = socket;
        }



        public String register(String[] args){
            try {
                String name = args[2];
                String password = args[3];
                String date_of_birth = args[5];
                String dbMsg1 = DBOperations.insert("insert into participants(name, password, date_of_birth) values ('" + name + "','" + password + "','" + date_of_birth + "')").get("error");

                if (dbMsg1 != null){
                    if (!dbMsg1.contains("Duplicate")){
                        return dbMsg1;
                    }
                }

                List<HashMap<String, String>> dbMsg2 = DBOperations.select("select * from participants where name='"+name+"'");

                if (!dbMsg2.get(0).get("password").equals(password)){
                    return "Wrong Password, Please try again!";
                }

                return "id="+dbMsg2.get(0).get("id");
            }
            catch (ArrayIndexOutOfBoundsException e){
                return "You supplied fewer arguments";
            }
            catch (Exception e){
                return e.getMessage();
            }
        }

        public String post(String[] args){
            try {
                int id = Integer.parseInt(args[0]);
                String product = args[2];
                String quantity = args[3];
                String price = args[4];

                //building description
                StringBuilder desc = new StringBuilder();
                for (int i = 5; i< args.length; i++){
                    desc.append(args[i]).append(" ");
                }

                List<HashMap<String, String>> dbMsg2 = DBOperations.select("select * from posts where participant_id="+id+";");
                String dbMsg1;
                if (dbMsg2.isEmpty()){
                    dbMsg1 = DBOperations.insert("insert into posts(product_name, quantity, price, description, participant_id) values ('"+product+"',"+quantity+","+price+",'"+desc+"','"+id+"');").get("error");
                    if (dbMsg1 != null){
                        return dbMsg1;
                    }
                    return "New product posted successfully";
                }

                if (dbMsg2.get(0).get("product_name").equals(product)){
                    dbMsg1 = DBOperations.update("update posts set quantity=quantity+"+quantity+", price="+price+", description='"+desc+"' where id="+dbMsg2.get(0).get("id")+";").get("error");
                    if (dbMsg1 != null){
                        return dbMsg1;
                    }
                    return "New items of the product "+product+" added successfully";
                }

                return "You can not post more than one product!";
            }
            catch (NumberFormatException e){
                return "Please first login!";
            }
            catch (ArrayIndexOutOfBoundsException e){
                return "You supplied fewer arguments";
            }
            catch (Exception e){
                return e.getMessage();
            }
        }

        public String performance(){
            return "perf";
        }

        public void run() {
            PrintWriter out = null;
            BufferedReader in = null;
            try {

                // get the outputstream of client
                out = new PrintWriter(clientSocket.getOutputStream(), true);

                // get the inputstream of client
                in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));

                String line;
                out.println("Menu|Register name password product date_of_birth|" +
                        "Post_product product_name description|" +
                        "Performance");
                while ((line = in.readLine()) != null) {

                    // writing the received message from
                    // client
                    System.out.printf(" Sent from the client: %s\n", line);
                    String[] commands = line.split(" ");

                    switch (commands[1]){
                        case "Register":
                            out.println(register(commands));
                            break;
                        case "Post_product":
                            out.println(post(commands));
                            break;
                        case "Performance":
                            out.println(performance());
                            break;
                        default:
                            out.println("Invalid command");
                    }
                }
            }
            catch (IOException | ArrayIndexOutOfBoundsException e ) {
                e.printStackTrace();
            }
            finally {
                try {
                    if (out != null) {
                        out.close();
                    }
                    if (in != null) {
                        in.close();
                        clientSocket.close();
                    }
                }
                catch (IOException e) {
                    e.printStackTrace();
                }
            }
        }
    }
}
