#Kmom04

Jag tycker att detta kursmoment var ett av de absolut bästa hittills. Jag har inte riktigt hängt med i hur ramverket fungerar och fick flera "Aha"-upplevelser under hela momentet. Till en början hade jag stora problem med att lägga till tjänsterna i DI. Jag skapade en egen "CDIFactory" som ligger under "app/src/base/APP" där jag tänkte att jag lägger till controllers m.m. dock så lyckades jag inte riktigt att få ihop det utan fick knyta in det i routern direkt, som tidigare. Ska se om jag kan lösa det framöver.

När jag väl hade laborerat lite med CDatabase och skulle börja bygga User-sidorna så visste jag inte riktigt hur jag skulle göra, tittade lite på vad andra gjort tidigare och fick lite inspiration igenom det. När jag sedan väl hade böjar gick det otroligt fort att skapa upp alla sidorna, länkarna och det var riktigt kul att se hur fort det gick att få ihop allting.

Till en början kände jag mig rätt begränsad i hur jag kan göra vissa saker i ramverket, att jag var "tvingad" att bygga upp formulären med HTMLForm, att jag skulle lägga till allting i "CDIFactoryDefault" osv. Måste säga att begränsningen är nog snarare kunskapen om ramverket, ju mer jag lärde mig om det, desto mer kunde jag göra. Är det något som jag saknar i ramverket är det nog snarare jag som inte vet hur det bör hanteras snarare än att ramverket är begränsat. Sedan finns det säkert som är mer begränsat men det tvivlar jag på att jag kommer stöta på i första taget.

Saker som jag behöver kolla mer på det är hur exakt jag kan använda mig av en egen "CDIFactory" och hur saniteringen av data hanteras med "HTMLForm". Var osäker på ifall saniteringen hanteras per default eller om jag behöver hantera detta vid user-"input/output".

Överlag känner jag att det är lätt att använda sig av formuläret och det har varit tydligt i kursmomenten hur jag implementerar det. Dock som jag nämnde tidigare, sanitering av in- och utdata vet jag inte riktigt hur det hanteras.

När det gäller databashanteringen så föredrar jag "vanlig" SQL-syntax i dagsläget. Detta med tanke på att jag är mer van med det, helt enkelt. Jag är en person som gillar förändring ändå, så jag kommer fortsätta att testa det här sättet och sedan får jag se vad som jag väljer att gå på. Spontant känns det som att det passar i olika sammanhang att använda det ena framför det andra.

Jag gjorde lite extra/nya vägar inledningsvis men sedan ångrade jag då jag gång på gång lyckades bygga in mig själv i ett hörn. Det var väldigt lärorikt och när jag sedan fick fram hela konceptet så fick jag en "aha"-upplevelse och ifall vi i kommande moment kommer använda oss av modellen så kommer jag säkerligen bygga om den lite.

Jag stötte även på ett rätt irriterande problem och det var i kommentarsuppgiften. Jag byggde om själva submitknappen så att det skulle stå ex. "Lämna kommentar". Upptäckte efter några timmas felsökning att det inte i dagsläget går att ha mellanslag i namnet, det blir fel i valideringen i HTMLform.

Vet inte riktigt vart jag ska lägga in förslag om förbättring. Önskvärt vore dock att kunna ha mellanslag som ovan, samt att jag inte alltid behöver en label till alla typer av inputs. Ibland kanske jag enbart vill använda placeholders istället. 

Jag valde bort extrauppgiften. Detta då kursmomentet tog mer 40tim att genomföra.