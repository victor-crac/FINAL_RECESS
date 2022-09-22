package org.socket;

import java.io.*;
import java.net.*;
import java.util.*;

// Client class
public class Client {

    // driver code
    public static void main(String[] args) {
        String id = null;
        // establish a connection by providing host and port
        // number
        try (Socket socket = new Socket("localhost", 1234)) {

            // writing to server
            PrintWriter out = new PrintWriter(socket.getOutputStream(), true);

            // reading from server
            BufferedReader in = new BufferedReader(new InputStreamReader(socket.getInputStream()));

            // object of scanner class
            Scanner sc = new Scanner(System.in);
            String line = null;
            System.out.println(in.readLine());

            while (!"exit".equalsIgnoreCase(line)) {

                // reading from user
//                System.out.println(">>");
                line = sc.nextLine();

                // sending the user input to server
                out.println(id+" "+line);
                out.flush();

                // displaying server reply
                String reply = in.readLine(); //.replace("|","\n");
                if (reply.startsWith("id=")){
                    System.out.println("Logged in successfully.");
                    id = reply.substring(3);
                }
                else{
                    System.out.println(reply);
                }

            }

            // closing the scanner object
            sc.close();
        }
        catch (IOException e) {
            e.printStackTrace();
        }
    }
}
