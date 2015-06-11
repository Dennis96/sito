#include <Ethernet.h>
#include <SPI.h>

// the media access control (ethernet hardware) address for the shield:
byte mac[] = { 0x90, 0xA2, 0xDA, 0x0F, 0x19, 0x2F };
//the IP address for the shield:
byte ip[] = { 192, 168, 10, 172 };                 // this is the assigned ip within the LAN
// the router's gateway address:
byte gateway[] = { 192, 168, 0, 11 };     // neccessary to get access to the internet 
//via your router
// the subnet:
//byte subnet[] = { XX, XX, XX, XX };
//the proxy server
char server[] = "http://tesinaesame96.altervista.org/arduino/add.php";                 

EthernetClient client;
 
void setup()
{
  Ethernet.begin(mac);
  Serial.begin(9600);
}
  
   

void loop()
{
  String Data="ciao billi";
  if (client.connect(server, 80))
  { 
    Serial.println("Connessione al Server");
    Serial.println();
        
    client.println("GET http://tesinaesame96.altervista.org/arduino/add.php");
    client.print("Content-Length: ");
    client.print(Data.length());
    client.println();
    client.print("arduino=");
    client.print(Data);
    Serial.println("Richiesta Post inviata con successo");
    client.stop();
    //Serial.flush();
  }
  else
  {
    Serial.println("Connessione al server fallita.");   
    Serial.println();
    //Serial.flush();
  }
  
delay(100000);

}
