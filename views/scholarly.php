<!DOCTYPE html>
<html lang="en">

<head>
    <title>Scholarly HTML</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="assets/styles/scholarly.css" />

</head>

<body prefix="schema: https://schema.org/" itemscope="" itemtype="http://schema.org/WebPage">
    <article prefix="sa:https://ns.science.ai/" typeof="schema:ScholarlyArticle">
        <header>
            <h1>Scholarly HTML - ClassMa</h1>
        </header>
        <h2>Cuprins</h2>
        <ul>
            <li>
                <a href="#authors">Autori</a>
            </li>
            <li>
                <a href="#introduction">1. Introducere</a>
                <ul>
                    <li><a href="#purpose">1.1 Motivatie</a></li>
                    <li><a href=" #document-conventions">1.2 Conventii Document</a></li>
                    <li><a href="#intended-audience">1.3 Audienta tinta si Sugestii</a></li>
                    <li><a href=" #product-scope">1.4 Scopul Aplicatiei</a>
                    </li>
                    <li><a href="#references">1.5 Referinte Document</a></li>
                </ul>
            </li>
            <li><a href="#overall-description">2. Descriere Generala</a>
                <ul>
                    <li><a href="#product-perspective">2.1 Perspectiva Aplicatiei</a></li>
                    <li><a href="#product-functions">2.2 Functiile Aplicatiei</a></li>
                    <li><a href="#users-characteristics">2.3 Utilizatori si Caracteristici</a>
                        <ul>
                            <li><a href="#student">2.3.1 Student</a></li>
                            <li><a href="#academic">2.3.2 Academic</a></li>
                            <li><a href="#administrator">2.3.3 Administrator</a></li>
                        </ul>
                    </li>
                    <li><a href="#operating-environment">2.4 Mediul de Operare</a></li>
                    <li><a href="#design-implementation-constraints">2.5 Limite de design si implementare</a></li>
                    <li><a href="#documentantion">2.6 Documentatie Utilizator</a></li>
                    <li><a href="#dependencies-assumptions">2.7 Dependinte si Factori</a></li>
                </ul>
            </li>

            <li><a href="#overall-interface">3. Cerinte Interfata Externa</a>
                <ul>
                    <li><a href="#user-interface">3.1 Interfata Utilizator</a></li>
                    <li><a href="#hardware-interface">3.2 Interfata Hardware</a></li>
                    <li><a href="#software-interface">3.3 Interfata Software</a></li>
                    <li><a href="#communication-interface">3.4 Interfata de Comunicare</a></li>
                </ul>
            </li>

            <li><a href="#overall-system">4. Cerinte Sistem</a></li>

            <li><a href="#overall-nonfunctional">5. Cerinte Nonfunctionale</a>
                <ul>
                    <li><a href="#performance-requirements">5.1 Cerinte de Performanta</a></li>
                    <li><a href="#safety-requirements">5.2 Cerinte de Siguranta</a></li>
                    <li><a href="#app-quality">5.3 Atribute pentru Calitatea Aplicatiei</a></li>
                    <li><a href="#usability-rules">5.4 Reguli de Utilizare</a></li>
                </ul>
            </li>

            <li><a href="#other-requirements">Alte Cerinte</a>
                <ul>
                    <li><a href="#appendix-a">Appendix A: Glosar</a></li>
                    <li><a href="#appendix-b">Appendix B: Referinte</a></li>
                </ul>
            </li>
        </ul>
        <section id="authors" typeof="sa:AuthorsList">
            <div role="contentinfo">
                <h2>Autori</h2>
                <ul>
                    <li typeof="sa:ContributorRole" property="schema:author">
                        <span typeof="schema:Person">
                            <meta property="schema:givenName" content="Victor" />
                            <meta property="schema:familyName" content="Rosca" />
                            <span property="schema:name">Victor Rosca</span>
                        </span>
                    </li>

                    <li typeof="sa:ContributorRole" property="schema:author">
                        <span typeof="schema:Person">
                            <meta property="schema:givenName" content="Vlad" />
                            <meta property="schema:familyName" content="Ghiorghita" />
                            <span property="schema:name">Vlad Ghiorghita</span>
                        </span>
                    </li>

                    <li typeof="sa:ContributorRole" property="schema:author">
                        <span typeof="schema:Person">
                            <meta property="schema:givenName" content="Codrin" />
                            <meta property="schema:familyName" content="Postu" />
                            <span property="schema:name">Codrin Postu</span>
                        </span>
                    </li>
                </ul>
            </div>
        </section>

        <section typeof="sa:Abstract">
            <div role="introduction">
                <h2 id="introduction">1. Introducere</h2>
                <h3 id="purpose">1.1 Motivatie</h3>
                <p>
                    Aplicatia ClassMa doreste sa ajute personalul academic si studentii oferindu-le
                    mai multe functionalitati pentru prezenta, trimitere de teme si vizualizarea acestora.
                    Scopul acestui document este specificarea resurselor si cerintelor aplicatiei ClassMa.
                </p>

                <h3 id="document-conventions">1.2 Conventii Document</h3>
                <p>
                    Acest document este bazat pe formatul Scholarly HTML si template IEEE.
                </p>

                <h3 id="intended-audience">1.3 Audienta tinta si Sugestii</h3>
                <p>
                    Acest document este destinat atat programatorilor care doresc sa foloseasca aplicatia pe un server
                    local cat si utilizatorilor care doresc sa afle toate informatiile si functionalitatile oferite
                    de aplicatie.
                </p>

                <h3 id="product-scope">1.4 Scopul Aplicatiei</h3>
                <p>
                    Aceasta aplicatie are scopul de a ajuta atat personalul academic cat si
                    studentii in desfasurarea orelor, fie in mediul online cat si in clase.
                    Pentru prezenta, in loc de a intreba fiecare student in parte daca este
                    prezent, profesorul poate genera un cod, iar toti studentii vor avea un timp
                    limitat de a-l introduce, ceea ce va ajuta la eliminarea timpului pierdut.
                    De asemenea, studentii vor putea vizualiza absentele si notele introduse pe parcursul
                    clasei.
                </p>
                <p>
                    Profesorul va putea la finalul semestrului (perioadei) sa foloseasca o ecuatie matematica
                    pentru a oferi tuturor studentilor o nota finala. Aceasta va functiona doar daca toti studentii
                    vor avea acelasi numar de note.
                </p>

                <h3 id="references" typeof="sa:ReferenceList">1.5 Referinte Document</h3>
                <ul>
                    <li class="reference" typeof="schema:ScholarlyArticle" resource="https://github.com/rick4470/IEEE-SRS-Tempate">
                        <span property="schema:author" typeof="schema:Person">
                            <span property="schema:givenName">Rick</span>
                            <span property="schema:familyName">H</span>.
                        </span>
                        <cite property="schema:name">IEEE-SRS-Template.</cite>
                        <span property="schema:isPartOf" typeof="schema:Periodical">
                            <span property="schema:name">GitHub</span>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li class="reference" typeof="schema:ScholarlyArticle" resource="https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html">
                        <span property="schema:author" typeof="schema:Person">
                            <span property="schema:givenName">Sabin</span>
                            <span property="schema:additionalName">Corneliu</span>
                            <span property="schema:familyName">Buraga</span>.
                        </span>
                        <cite property="schema:name">Tehnologii Web.</cite>
                        <span property="schema:isPartOf" typeof="schema:PublicationVolume">
                            <span property="schema:isPartOf" typeof="schema:Periodical">
                                <span property="schema:name">Facultatea de Informatica Iasi, UAIC</span>
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
        </section>

        <section typeof="sa:MaterialsAndMethods">
            <h2 id="overall-description">2. Descriere Generala</h2>

            <h3 id="product-perspective">2.1 Perspectiva Aplicatiei</h3>
            <p>
                Aplicatia ClassMa este proiectul pentru materia Tehnologii Web a celor trei autori.
                Acest proiect este in etapa de dezvoltare, momentan lucrandu-se la functionalitatile principale ce vor
                fi prezentate pe parcursul acestui document.
            </p>

            <h3 id="product-functions">2.2 Functiile Aplicatiei</h3>
            <p>Functiile principale ale aplicatiei sunt:</p>
            <ul>
                <li>Creare cont student/academic</li>
                <li>Intrare in aplicatie folosind contul creat</li>
                <li>Posibilitatea de a schimba datele contului (Nume, Parola)</li>
                <li>Introducerea unui cod de clasa pentru a deveni student la o anumita clasa</li>
                <li>Introducerea unui cod de prezenta pentru a confirma ca studentul este prezent</li>
                <li>Statistici legate de prezenta</li>
                <li>Posibilitatea de a trimite/verifica teme si de a pune/primi note</li>
                <li>Posibilitatea de a calcula nota finala folosind o formula matematica</li>
            </ul>

            <h3 id="users">2.3 Utilizatori si Caracteristici</h3>
            <p>Vor fi trei tipuri de utilizatori:</p>
            <ul>
                <li>
                    Student - orice persoana care doreste sa participe in calitate de student la o clasa sau mai multe. Aceasta
                    va putea folosi aplicatia zilnic pentru a sta la curent cu temele/lectiile postate
                </li>
                <li>
                    Academic - orice persoana care este profesor si doreste sa isi creeze o clasa pentru a se folosi de
                    caracteristicile aplicatiei
                </li>
                <li>
                    Administrator - doar pentru autorii proiectului pentru a putea analiza functionarea aplicatiei. Acest
                    tip de utilizator nu este implementat.
                </li>
            </ul>

            <h4 id="student">2.3.1 Student</h4>
            <ul>
                <li>Poate sa intre in cont</li>
                <li>Poate sa trimita un cod de clasa, pentru a anunta dorinta de a face parte dintr-o clasa</li>
                <li>Poate sa vizualizeze informatiile claselor din care face parte</li>
                <li>Poate sa vizualizeze teme si/sau lectii postate de profesor</li>
                <li>Poate sa trimita teme in timpul precizat de profesor</li>
                <li>Poate sa trimita cod de prezenta si vizualiza statisticile</li>
            </ul>

            <h4 id="academic">2.3.2 Academic</h4>
            <ul>
                <li>Poate sa intre in cont</li>
                <li>Poate sa creeze o clasa</li>
                <li>Poate sa accepte/stearga studenti dintr-o clasa pe care a creat-o</li>
                <li>Poate sa adauge lectii si teme</li>
                <li>Poate sa verifice temele si nota studentii</li>
                <li>Poate sa foloseasca o ecuatie pentru a pune o nota finala tuturor studentilor</li>
            </ul>

            <h4 id="administrator">2.3.3 Administrator</h4>
            <ul>
                <li>Poate sa intre in cont</li>
                <li>Poate sa schimbe informatii despre alti utilizatori</li>
                <li>Poate vizualiza toate clasele si statistici despre acestea</li>
            </ul>

            <h3 id="operating-environment">2.4 Mediul de Operare</h3>
            <p>
                Aplicatia poate fi folosita fie pe un calculator cu un ecran de orice dimensiuni, sau
                pe smartphone (android/iOS) cu un ecran cu o latime de cel putin 300px.
            </p>

            <h3 id="design-implementation-constraints">2.5 Limite de design si implementare</h3>
            <p>
                Aplicatia ClassMa este dezvoltata pe partea de interfata folosind doar HTML5, CSS3 si JavaScript.
                Pe partea de back-end este folosit limbajul PHP fara librarii sau framework si o baza de date MySQL.
            </p>

            <h3 id="documentantion">2.6 Documentatie Utilizator</h3>
            <p>
                Acest document poate fi folosit ca un manual pentru utilizatori, acesta continand informatii despre aplicatie
                in detaliu.
            </p>

            <h3 id="dependencies-assumptions">2.7 Dependinte si Factori</h3>
            <p>Pot fi urmatorii factori care vor rezulta la imposibilitatea de a folosi aplicatia:</p>
            <ul>
                <li>Latimea ecranului este sub 300px</li>
                <li>JavaScript nu este activat</li>
                <li>Erori care nu au fost gasite in timpul dezvoltarii aplicatiei</li>
            </ul>

        </section>

        <section typeof="sa:Interfaces">
            <h2 id="overall-description">3. Cerinte Interfata Externa</h2>

            <section typeof="sa:UserInterface">
                <h3 id="product-perspective">3.1 Interfata Utilizator</h3>
                <p>Utilizatorul interactioneaza cu o multitudine de pagini, dar marea parte din timpul petrecut
                    in aplicatie va fi concentrat pe acelasi format. Acest design este facut pentru a fi mult mai
                    usor de inteles si de utilizat aplicatia.
                </p>
                <section typeof="sa:HomepageInterface">
                    <h4>3.1.1 Pagina Principala</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/homepage.png" alt="Landing Page">
                        <figcaption>Pagina principala pe care intra orice utilizator</figcaption>
                    </figure>
                    <p>Aceasta pagina este primul lucru pe care orice vizitator/utilizator il va vedea,
                        de aceea este conceputa pentru a avea access la toate informatiile intr-un singur click.
                    </p>

                    <p>Utilizatorul poate sa isi creeze cont, sa intre in cont sau sa citeasca informatiile disponibile
                        in josul paginii. De asemenea la finalul acestei pagini, este un link catre acest document si un
                        formular pentru contact.
                    </p>
                </section>

                <section typeof="sa:AuthInterface">
                    <h4>3.1.2 Pagina Login/Inregistrare</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/loginpage.png" alt="Login Page">
                        <figcaption>Pagina de Login</figcaption>
                    </figure>
                    <p>Aceasta pagina va fi folosita de utilizator pentru a intra in contul creat. De asemenea, pagina
                        de inregistrare are acelasi format, pentru a fi usor de inteles.
                    </p>

                    <p>Cele doua pagini (Login/Inregistrare) vor oferi feedback vizual in cazul in care o informatie este
                        incorecta sau lipsa.
                    </p>
                </section>

                <section typeof="sa:DashboardInterface">
                    <h4>3.1.2 Pagina Meniu</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/dashboardpage.png" alt="Dashboard Page">
                        <figcaption>Pagina de Meniu</figcaption>
                    </figure>
                    <p>Pagina respectiva este foarte simpla. Cel mai important aspect este bara de pe partea stanga.
                        Acolo sunt toate link-urile catre functionalitatile aplicatiei si catre clasele din cara
                        utilizatorul face parte.
                    </p>
                </section>

                <section typeof="sa:JoinClassInterface">
                    <h4>3.1.2 Pagina de adaugat cod pentru o Clasa</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/joinclassroompage.png" alt="Join Classroom Page">
                        <figcaption>Pagina de adaugat cod pentru o clasa</figcaption>
                    </figure>
                    <p>Aici utilizatorul (studentul) va putea sa adauge un cod primit de la profesor pentru a trimite o
                        cerere de a intra in clasa. Ulterior, profesorul va putea accepta cererea.
                    </p>
                </section>

                <section typeof="sa:CreateClassInterface">
                    <h4>3.1.2 Pagina Creare Clasa</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/createclasspage.png" alt="Create Class Page">
                        <figcaption>Pagina de Creare Clasa</figcaption>
                    </figure>
                    <p>Pagina contine un formular pe care profesorul il poate completa pentru a ii fi creata o clasa.
                        In cazul in care nu este ceva completat corect, va aparea o eroare sub linia respectiva.
                    </p>
                </section>

                <section typeof="sa:InfoClassInterface">
                    <h4>3.1.2 Pagina Informatii Clasa</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/classinfopage.png" alt="Class Information Page">
                        <figcaption>Pagina de Informatii Clasa</figcaption>
                    </figure>
                    <p>Aceasta pagina contine informatiile adaugate de profesor in momentul in care a creat clasa.
                        Aceste informatii nu pot fi modificate.
                    </p>
                </section>

                <section typeof="sa:AttendanceInterface">
                    <h4>3.1.2 Pagina Prezenta (Studenti)</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/attendancepage.png" alt="Attendance Page">
                        <figcaption>Pagina de Prezenta</figcaption>
                    </figure>
                    <p>Studentul poate folosi aceasta pagina pentru a introduce codul de prezenta primit de la profesor.
                        De asemenea, el va avea informatii legat de prezentele trecute si un procentaj al prezentelor.
                    </p>
                </section>

                <section typeof="sa:AcademicAttendanceInterface">
                    <h4>3.1.2 Pagina Prezenta (Profesori)</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/attendanceprofpage.png" alt="Attendance Page">
                        <figcaption>Pagina de Prezenta</figcaption>
                    </figure>
                    <p>Profesorul poate apasa pe "Generate Code" dupa ce selecteaza timpul pentru a crea un cod unic de
                        prezenta. Doar un singur cod poate fi activ pentru o clasa in acelasi timp. Codurile de prezenta
                        nu pot fi sterse.
                    </p>
                </section>

                <section typeof="sa:GradeInterface">
                    <h4>3.1.2 Pagina Note</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/finalgradepage.png" alt="Grade Page">
                        <figcaption>Pagina Note</figcaption>
                    </figure>
                    <p>Pagina poate fi folosita de profesori pentru a urmari statisticile studentilor si pentru a adauga
                        note noi.
                    </p>
                </section>

                <section typeof="sa:StudentsInterface">
                    <h4>3.1.2 Pagina Studenti</h4>
                    <figure typeof="sa:image">
                        <img src="assets/images/png/studentspage.png" alt="Students Page">
                        <figcaption>Pagina Studenti</figcaption>
                    </figure>
                    <p>Aceasta pagina este restrictionata doar profesorilor, pentru a vizualiza lista de studenti si
                        de a accept/sterge studentii dintr-o clasa.
                    </p>
                </section>

            </section>
            <section typeof="sa:HardwareInterface">
                <h3 id="hardware-interface">3.2 Interfata Hardware</h3>
                <p>Interfata si serverul comunica prin protocolul HTTP prin metode GET si POST. Pentru utilizarea aplicatiei
                    poate fi folosit orice dispozitiv care suporta un browser modern.
                </p>
                <P>Pentru a salva statutul de login a unui utilizator se foloseste sesiunea, unde este salvat id-ul utilizatorului.
                    Restul informatiilor necesare pentru popularea paginilor sunt extrase din baza de date. Pentru a asigura ca
                    aplicatia este folosita doar de utilizatori autentificati, fiecare request prin metodele GET sau POST sunt
                    trecute printr-un middleware care verifica daca utilizatorul/vizitatorul are permisiunea de a vizualiza/efectua
                    actiunea. In cazul in care nu este permis, va primi o eroare de instiintare.
                </P>
            </section>


            <section typeof="sa:SoftwareInterface">
                <h3 id="software-interface">3.3 Interfata Software</h3>
                <p>Vor fi trei tipuri de utilizatori:</p>
            </section>
        </section>

        <h3 id="operating-environment">2.4 Mediul de Operare</h3>
        <p>
            Aplicatia poate fi folosita fie pe un calculator cu un ecran de orice dimensiuni, sau
            pe smartphone (android/iOS) cu un ecran cu o latime de cel putin 300px.
        </p>

        <h3 id="design-implementation-constraints">2.5 Limite de design si implementare</h3>
        <p>
            Aplicatia ClassMa este dezvoltata pe partea de interfata folosind doar HTML5, CSS3 si JavaScript.
            Pe partea de back-end este folosit limbajul PHP fara librarii sau framework si o baza de date MySQL.
        </p>

        <h3 id="documentantion">2.6 Documentatie Utilizator</h3>
        <p>
            Acest document poate fi folosit ca un manual pentru utilizatori, acesta continand informatii despre aplicatie
            in detaliu.
        </p>

        <h3 id="dependencies-assumptions">2.7 Dependinte si Factori</h3>
        <p>Pot fi urmatorii factori care vor rezulta la imposibilitatea de a folosi aplicatia:</p>
        <ul>
            <li>Latimea ecranului este sub 300px</li>
            <li>JavaScript nu este activat</li>
            <li>Erori care nu au fost gasite in timpul dezvoltarii aplicatiei</li>
        </ul>

        </section>

        <section typeof="sa:ReferenceList">
            <h2 id="other-requirements">Alte Cerinte</h2>

            <h3 id="appendix-a">Appendix A: Glosar</h3>


            <h3 id="appendix-b">Appendix B: Referinte imagini folosite in aplicatie</h3>
            <ul>
                <li>
                    <a property="schema:hasPart" href="https://fontawesome.com/license/free">Imagini Font Awesome</a>
                </li>
                <li>
                    <a property="schema:hasPart" href="https://undraw.co/license">Imagini pentru pagina principala
                        source</a>
                </li>
            </ul>
        </section>
    </article>
</body>

</html>