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
                    <li><a href="#references">1.5 Referinte</a></li>
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
                    Acest document este bazat pe template-ul IEEE.
                </p>

                <h3 id="intended-audience">1.3 Audienta tinta si Sugestii</h3>
                <p>
                    Acest document este destinat atat programatorilor cat si utilizatorilor.
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

                <h3 id="references" typeof="sa:ReferenceList">1.5 Referinte</h3>
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
                Acest proiect este in etapa de dezvoltare, momentan lucrandu-se la interfata. Orice aspect
                al aplicatiei poate fi modificat in viitor daca nu este considerat eficient sau potrivit
                pentru scopul aplicatiei.
            </p>

            <h3 id="product-functions">2.2 Functiile Aplicatiei</h3>
            <p>Functiile principale ale aplicatiei sunt:</p>
            <ul>
                <li>Creare cont student/academic</li>
                <li>Intrare in aplicatie folosind contul creat</li>
                <li>Posibilitatea de a schimba datele contului (Nume, Email, Parola)</li>
                <li>Introducerea unui cod pentru a deveni student la o anumita clasa</li>
                <li>Introducerea unui cod pentru a confirma ca studentul este prezent</li>
                <li>Statistici legate de prezenta si note</li>
            </ul>

            <h3 id="users">2.3 Utilizatori si Caracteristici</h3>
            <p>Vor fi trei tipuri de utilizatori:</p>
            <ul>
                <li>
                    Student - orice persoana care doreste sa participe in calitate de student la o clasa sau mai multe
                </li>
                <li>
                    Academic - orice persoana care este profesor si doreste sa isi creeze o clasa pentru a se folosi de
                    caracteristicile aplicatiei
                </li>
                <li>
                    Administrator - doar pentru autorii proiectului pentru a putea analiza functionarea aplicatiei
                </li>
            </ul>

            <h4 id="student">2.3.1 Student</h4>
            <ul>
            </ul>

            <h4 id="academic">2.3.2 Academic</h4>
            <ul>
            </ul>

            <h4 id="administrator">2.3.3 Administrator</h4>
            <ul>
            </ul>

            <h3 id="operating-environment">2.4 Mediul de Operare</h3>
            <p>
                Aplicatia poate fi folosita fie pe un calculator cu un ecran de orice dimensiuni, sau
                pe smartphone (android/iOS) cu un ecran cu o latime de cel putin 300px.
            </p>

            <h3 id="design-implementation-constraints">2.5 Limite de design si implementare</h3>
            <p>
                Aplicatia ClassMa este dezvoltata pe partea de interfata folosind doar HTML5, CSS3 si JavaScript.
                Nu sunt folosite nici o librarie sau framework.
            </p>

            <h3 id="documentantion">2.6 Documentatie Utilizator</h3>
            <p>
                Momentan nu exista un manual de utilizare al aplicatiei.
            </p>

            <h3 id="dependencies-assumptions">2.7 Dependinte si Factori</h3>
            <p>Pot fi urmatorii factori care vor rezulta la imposibilitatea de a folosi aplicatia:</p>
            <ul>
                <li>Latimea ecranului este sub 300px</li>
                <li>JavaScript nu este activat</li>
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