#include <Dhcp.h>
#include <Dns.h>
#include <Ethernet.h>
#include <EthernetClient.h>
#include <EthernetServer.h>
#include <EthernetUdp.h>
#include <SPI.h>

// MAC address
byte mac[] = { 0x90, 0xA2, 0xDA, 0x00, 0x62, 0xF8 };
// client Ethernet
EthernetClient ethclient; 
// eventuale indirizzo IP statico da utilizzare
IPAddress ip(192, 168, 1, 50);
 
void setup()
{
    Serial.begin(9600);
    // se la connessione attraverso DHCP fallisce
    if (Ethernet.begin(mac) == 0)
    {
        Serial.println("!eseguo inizializzazione con indirizzo IP statico");       
        Ethernet.begin(mac, ip);
    }
     else
    {
        Serial.println("eseguo inizializzazione con indirizzo IP dinamico");       
    }  
  
   
}
void loop()
{
   if (ethclient.connect("http://tesinaesame96.altervista.org/arduino/add.php", 80))
    {
        Serial.println("Connessione avvenuta!");
        //Serial.println("Scrivi!");
        //delay(5000);
        //while(Serial.available()>0){
          ethclient.println("POST / HTTP/1.1");
          ethclient.println("Host: http://tesinaesame96.altervista.org/arduino/add.php");
          ethclient.println();
          //char tmp=Serial.read();
          //Serial.println(tmp);
          ethclient.print("scritta=OKOKOK");
          Serial.println("OK!");
      //}
    }
  if(ethclient.connected())
  {
    ethclient.stop();
  }
  
  delay(10000);
}
