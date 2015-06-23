<?php
error_reporting(E_ALL | E_STRICT);
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 1);

$content_start =
"<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"
. "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"\n"
. "    \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n"
. "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n"
. "<head>"
. "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n"
. "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\" />\n"
. "<title>Test Book</title>\n"
. "</head>\n"
. "<body>\n";
 
$bookEnd = "</body>\n</html>\n";

$fileDir = './PHPePub';

include_once("lib/EPub.php");

$book = new EPub(); // Default is EPub::BOOK_VERSION_EPUB2

// Title and Identifier are mandatory!
$book->setTitle($_POST['book_title']);
$book->setIdentifier("http://JohnJaneDoePublications.com/books/TestBook.html", EPub::IDENTIFIER_URI); // Could also be the ISBN number, prefered for published books, or a UUID.
$book->setLanguage("en"); // Not needed, but included for the example, Language is mandatory, but EPub defaults to "en". Use RFC3066 Language codes, such as "en", "da", "fr" etc.
$book->setDescription("This is a brief description\nA test ePub book as an example of building a book in PHP");
$book->setAuthor("John Doe Johnson", "Johnson, John Doe");
$book->setPublisher("John and Jane Doe Publications", "http://JohnJaneDoePublications.com/"); // I hope this is a non existant address :)
$book->setDate(time()); // Strictly not needed as the book date defaults to time().
$book->setRights("Copyright and licence information specific for the book."); // As this is generated, this _could_ contain the name or licence information of the user who purchased the book, if needed. If this is used that way, the identifier must also be made unique for the book.
$book->setSourceURL("http://JohnJaneDoePublications.com/books/TestBook.html");

$book->addDublinCoreMetadata(DublinCore::CONTRIBUTOR, "PHP");

$book->setSubject("Test book");
$book->setSubject("keywords");
$book->setSubject("Chapter levels");

// Insert custom meta data to the book, in this cvase, Calibre series index information.
$book->addCustomMetadata("calibre:series", "PHPePub Test books");
$book->addCustomMetadata("calibre:series_index", "1");

$cssData = "body {\n  margin-left: .5em;\n  margin-right: .5em;\n  text-align: justify;\n}\n\np {\n  font-family: serif;\n  font-size: 10pt;\n  text-align: justify;\n  text-indent: 1em;\n  margin-top: 0px;\n  margin-bottom: 1ex;\n}\n\nh1, h2 {\n  font-family: sans-serif;\n  font-style: italic;\n  text-align: center;\n  background-color: #6b879c;\n  color: white;\n  width: 100%;\n}\n\nh1 {\n    margin-bottom: 2px;\n}\n\nh2 {\n    margin-top: -2px;\n    margin-bottom: 2px;\n}\n";

$book->addCSSFile("styles.css", "css1", $cssData);


$chapter1_heading = "";

if (isset($_POST['book_title_in_chapter'])) {
	$chapter1_heading = "<h1>" . $_POST['book_title'] . "</h1>";
}

$chapter1 =
	$content_start . $chapter1_heading .
'<p>Um <a href="http://www1.folha.uol.com.br/mercado/2015/06/1645466-uma-em-cada-4-noticias-no-twitter-e-falsa.shtml" target="_blank">estudo apontou que quase um quarto</a> de tudo o que é publicado no Twitter é falso.</p><p>Alguns de meus alunos de jornalismo defenderam que isso é irrelevante, pois as pessoas sabem reconhecer uma notícia falsa de uma mentira ou de um exagero. Sabem de nada, inocentes.</p><p>Para mostrar como é fácil fazer uma boa notícia falsa batendo em alguém, produzi esse breve e básico manual (Pera! Pausa para a piada do internauta: &#8220;Ah, japonês, decidiu escrever sobre si mesmo, né?. Pausa para a risada: &#8220;Hehehe. Pronto, voltamos à nossa programação normal rs).</p><p>Por favor, não estou falando do Sensacionalista ou do Piauí Herald (#amo), mas de setores da esquerda e da direita partidárias, além de fundamentalistas e defensores do indefensável, que já adotam essas ações há muito tempo no intuito de confundir. Agora é a hora de vocês descobrirem como a máquina funciona.</p><p><strong>Como produzir notícias falsas e fazer sucesso na internet<br /></strong></p><p><strong>1) Onde escrever</strong></p><p>Comece criando uma página na rede com um nome que pareça o de um veículo jornalístico. Muitos leitores que se informam apenas pelo WhatsApp ou pelas redes sociais não fazem distinção entre o que vem da Folha de S.Paulo, de O Globo, da Carta Capital (vocês podem concordar ou não, mas são empresas conhecidas e podem ser processadas em caso de erro ou má fé) ou de qualquer coisa que possa ter sido criada minutos antes, como um &#8220;Diário do Amanhã ou um &#8220;Notícia Expressa.</p><p>Daí, se a página será anônima ou se estará hospedada no Casaquistão depende do que você tiver para esconder e do quanto pretende bater nas pessoas e em instituições a ponto de ser processado.</p><p><strong>2) Título</strong></p><p>Comece fazendo um título bombástico. Isso mesmo: aquela ideia de que o título é decorrência do texto não vale aqui. Um exemplo, usando a rainha Elsa, de Frozen (#adoro):</p><p><strong>Você não vai acreditar nisso! Rainha Elsa é envolvida em escândalo do gelo na Noruega</strong></p><p>OK, mas você pode ir mais fundo. O título não precisa ser verdadeiro, desde que chame a atenção do público e jogue dúvida sobre o seu alvo. &#8220;Ah, mas os leitores vão cair nessa?</p><p>A graça da coisa é que você não precisa se preocupar com isso. O importante é colocar uma pulga atrás da orelha do internauta, que vai passar a encarar o seu alvo (pessoa, instituição, ideia) de uma forma diferente dali em diante.</p><p>O leitor médio brasileiro não diferencia uma fonte confiável de uma que não é. Nem mesmo sente falta delas em um texto de denúncia. Para ele, a validação do texto está, em boa parte das vezes, no próprio texto. Se a &#8220;notícia lhe parecer factível e for ao encontro de sua visão de mundo (muita gente não admite consumir informações que contestem sua visão de mundo), ele absorve aquilo, forma a opinião e passa o conteúdo adiante.</p><p>E, afinal de contas, alguém vai se dignar a checar alguma coisa?</p><p><strong>Rainha Elsa é acusada de desviar gelo que iria para a merenda de crianças pobres</strong></p><p>Tente reunir no título um elemento que fomente ódio contra o seu alvo junto ao público de forma imediata (corrupção, pedofilia, assassinato de idosos, furto de bebês, o Corinthians&#8230;). Se der para colocar mais de um então, será a glória. Seja assertivo, demonstre certeza, não importa o quão ridículo seja essa associação. Você pode até rir da sua obra-prima ao final, mas o público levará a sério.</p><p><strong>Rainha Elsa, envolvida em corrupção, também é acusada de incesto com a própria irmã</strong></p><p>E tente seguir a fórmula &#8220;sujeito &#8211; verbo &#8211; predicado. Quanto mais parecido com uma estrutura de manchete de fácil digestão, voltado para a massa (tipo Jornal Nacional), melhor.</p><p><strong>Castelo da Rainha Elsa foi erguido com escravos suecos e cubanos</strong></p><p><strong>3) Foto</strong></p><p>Escolha uma boa foto do seu alvo. Vá até o Google e pegue uma que possa ser usada no contexto que você criou. Corte, edite, transforme, não importa &#8211; o Photoshop está aí para isso mesmo. Mas faça a imagem comprovar o que você alertou no título. E use uma legenda para explicitar o novo significado que você queira dar a ela e conduzir o leitor para onde quiser.</p><div id="attachment_25357" style="width: 610px" class="wp-caption aligncenter"><a href="http://imguol.com/blogs/61/files/2015/06/elsa2.jpg"><img class="wp-image-25357 size-full" src="http://imguol.com/blogs/61/files/2015/06/elsa2.jpg" alt="Elsa e o castelo superfaturado: luxo sustentado pelo desvio de gelo que iria para a merenda de crianças pobres da periferia de Arendelle" width="600" height="367" /></a><p class="wp-caption-text">Elsa e o castelo superfaturado: luxo sustentado pelo desvio de gelo que iria para a merenda de crianças pobres da periferia de Arendelle</p></div><p>Descontextualize a imagem original. Alguns jornalistas, políticos e empresários fazem isso há tempos: torturam fotos a serviço da tese que estão defendendo. Por que o restante dos cidadãos também não poderia?</p><p>A foto abaixo é fruto de uma brincadeira nos Estados Unidos com o personagem da Disney. Não é real &#8211; em nenhum sentido possível. Mas, não importa, cabe feito uma luva:</p><div id="attachment_25358" style="width: 510px" class="wp-caption aligncenter"><a href="http://imguol.com/blogs/61/files/2015/06/elsa1.jpg"><img class="size-full wp-image-25358" src="http://imguol.com/blogs/61/files/2015/06/elsa1.jpg" alt="Rainha Elsa é presa pela Operação Uísque Caubói da Polícia Federal" width="500" height="441" /></a><p class="wp-caption-text">Rainha Elsa é presa pela Operação Uísque Caubói da Polícia Federal</p></div><p><strong>4) Texto</strong></p><p>Tenha o cuidado de não cometer erros de gramática e ortografia. Vale lembrar, como dito acima, que o conteúdo dessas &#8220;matérias não são ratificados por fontes de informação confiáveis. A credibilidade é dada pelo próprio texto, o que inclui o seu nível de correção ortográfica e gramatical. Sim, a forma é conteúdo.</p><p>&#8220;Claro que esse texto sobre a Elsa diz a verdade! Olha como ele é bem escrito!</p><p>Escreva um texto curto. Não precisa ser genial, pelo contrário: deve que ser simples para poder ser compreendido por um maior número de pessoas e usar alguns códigos do jornalismo. Comece-o com um lide (parágrafo inicial de muitos textos noticiosos, que traz a informação mais relevante do texto, respondendo &#8211; de forma objetiva &#8211; indagações como quem, quando, onde, por que, o que e como. Crie um histórico das sacanagens anteriores do seu algo &#8211; não importa se não mentiras, o que importa é que você faça o histórico. A partir daí, pode lascar opinião.</p><p>Muita gente não faz diferença alguma entre um texto opinativo e um narrativo. No jornalismo, os dois têm seu valor, mas informação precede opinião em casos de denúncias &#8211; o que, não raro, parece passar despercebido entre muitos dos que defendem ou criticam, por exemplo, o governo Dilma, o governo Alckmin ou o reinado de Elsa. Então, opine à vontade e não se preocupe com muitos dados. Na dúvida, invente.</p><p>Se puder, coloque links que mandam para outros sites. Hiperlinks, mesmo que não conectem a nenhuma nova informação, têm um efeito de respaldo: &#8220;olha, não sou só eu que digo isso, mas outros também. Um link, por exemplo, que mostra que a gestão de Elsa fechou um contrato gigante de fornecimento de gelo pode ser muito útil. Não importa se o contrato estava legalmente correto, o que importa é inserir uma dúvida.</p><p>O ideal é que você produza vários sites com variações do mesmo texto, um se referindo a outro. Isso dá a impressão de que há um rosário de veículos tratando do mesmo assunto, como se fosse o tema do momento. Percebeu? Um discurso não legitimado necessariamente pelos fatos, mas por outros discursos, em uma teia sem fim, sustentada por coisa alguma. Pós-moderno demais? Desculpe, é a internet.</p><p>Como uma cebola: quem nunca a viu, acha que é algo suculento, como uma maçã ou um abacate. Mas, retirando camada por camada, você percebe que, lá dentro, só tem vento.</p><p>E lembre-se: pouca gente lê textos na internet. Olham títulos, veem fotos, claro, mas apenas checam se há um texto explicando tudo, sem necessariamente lê-lo. Como disse no início, um bom título e foto é que levam a compartilhamentos, retuítes e likes, ou seja, à disseminação e validação coletiva. Quanto mais perfis falsos ou verdadeiros de Facebook, Twitter e Instagram você tiver para o serviço, melhor. Coloque todos para curtir os textos divulgados e sugeri-los a amigos, fazendo a roda viva girar.</p><p>Daí é só correr para o abraço.</p><p>E assistir, de camarote, como a população &#8211; que sabe escolher entre um alface bom e um ruim na feira, mas não foi educada (e isso deveria fazer parte do currículo escolar) para identificar o que é uma notícia e um argumento falsos, seja com viés de esquerda ou de direita &#8211; devora a si mesma. E o próprio futuro.</p>' .
    $bookEnd;


$book->addChapter("Chapter 1: Lorem ipsum", "Chapter001.html", $chapter1, true, EPub::EXTERNAL_REF_ADD);

$book->finalize(); // Finalize the book, and build the archive.

$zipData = $book->sendBook("ExampleBook1");

?>