<?php

include_once('controllers/conexao.php');
include('menu.php');
// $ultimosCad = mysqli_query($conexao, "SELECT * FROM beats");
// ORDER BY id DESC LIMIT 6; 




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/planos.css">
    <link rel="stylesheet" href="styles/modal.css">
    <script src="scripts/index.js"></script>
    <script src="scripts/modal.js"></script>
</head>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cardsContainer = document.querySelector('.cards-container');
        const navDotsContainer = document.querySelector('.nav-dots');
        let cardIndex = 0;
        let cardWidth = document.querySelector('.card').offsetWidth;
        const cardsCount = cardsContainer.children.length;

        // Cria os pontos de navegação
        for (let i = 0; i < cardsCount; i++) {
            const dot = document.createElement('span');
            dot.classList.add('dot');
            if (i === 0) {
                dot.classList.add('active');
            }
            dot.dataset.index = i;
            navDotsContainer.appendChild(dot);

            dot.addEventListener('click', function() {
                cardIndex = i;
                updateCardsPosition();
                updateDots();
            });
        }

        function updateCardsPosition() {
            const newPosition = -cardIndex * cardWidth;
            cardsContainer.style.transform = `translateX(${newPosition}px)`;
        }

        function updateDots() {
            document.querySelectorAll('.nav-dots .dot').forEach(dot => {
                dot.classList.remove('active');
            });
            document.querySelector(`.nav-dots .dot[data-index='${cardIndex}']`).classList.add('active');
        }

        function autoNext() {
            cardIndex = (cardIndex + 1) % cardsCount;
            updateCardsPosition();
            updateDots();
        }

        setInterval(autoNext, 7000);

        // Atualiza o cardWidth ao redimensionar a janela
        window.addEventListener('resize', () => {
            cardWidth = document.querySelector('.card').offsetWidth;
            updateCardsPosition();
        });

        const boxes = document.querySelectorAll('.scroll_animado');

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target); // Para de observar o elemento depois que ele foi animado
                }
            });
        }, {
            threshold: 0.4 // Ativa a animação quando 50% do elemento estiver visível
        });

        boxes.forEach(box => {
            observer.observe(box);
        });

    });
</script>


<body>

    <section class="hero carousel">
        <div class="cards-container">

            <div class="img_capa card">
                <span>
                    <div class="container">
                        <h2>Sua jornada para a liberdade financeira começa aqui!</h2>
                        <p>Organize suas finanças com soluções personalizadas para suas necessidades.</p>
                        <br>
                        <!-- <a href="#contact" class="cta-button">Entre em contato</a> -->
                    </div>
                </span>
                <img src="imgs/consultoria-financeira.webp" alt="foto_capa" class="img">
            </div>
            <div class="img_capa card">
                <span>
                    <div class="container">
                        <h2>Diagnóstico de problemas e oportunidades para sua empresa</h2>

                        <p>Oferecemos soluções personalizadas para suas necessidades financeiras.</p>
                        <br>
                        <!-- <a href="#contact" class="cta-button">Entre em contato</a> -->
                    </div>
                </span>
                <img src="imgs/problemas_oportunidades.jpg " alt="foto_capa" class="img">
            </div>
            <div class="img_capa card">
                <span>
                    <div class="container">
                        <h2>Tenha clareza sobre suas finanças</h2>

                        <p>Obtenha uma visão detalhada e transparente da sua situação financeira, permitindo tomar decisões inteligentes e assertivas.</p>
                        <br>
                        <!-- <a href="#contact" class="cta-button">Entre em contato</a> -->
                    </div>
                </span>
                <img src="imgs/computador_graficos.jpg" alt="foto_capa" class="img">
            </div>
            <div class="img_capa card">
                <span>
                    <div class="container">
                        <h2>Desenvolva processos financeiros eficientes</h2>

                        <p>Crie, simplifique ou melhore seus processos financeiros. Aumente sua produtividade e precisão na gestão.</p>
                        <br>
                        <!-- <a href="#contact" class="cta-button">Entre em contato</a> -->
                    </div>
                </span>
                <img src="imgs/mulher_tablet.jpg" alt="foto_capa" class="img">
            </div>
            <div class="img_capa card">
                <span>
                    <div class="container">
                        <h2>Invista seu dinheiro de forma segura e inteligente</h2>

                        <p>Aprenda a aplicar seus recursos com estratégias bem fundamentadas, garantindo segurança e crescimento sustentável.</p>
                        <br>
                        <!-- <a href="#contact" class="cta-button">Entre em contato</a> -->
                    </div>
                </span>
                <img src="imgs/investimento.jpg" alt="foto_capa" class="img">
            </div>
            <div class="img_capa card">
                <span>
                    <div class="container">
                        <h2>Tenha um orçamento estratégico e eficiente</h2>

                        <p>Planeje seu orçamento de maneira estratégica para alcançar seus objetivos financeiros com eficiência e eficácia.
                        <p>
                            <br>
                            <!-- <a href="#contact" class="cta-button">Entre em contato</a> -->
                    </div>
                </span>
                <img src="imgs/orcamento.jpg" alt="foto_capa" class="img">
            </div>
            <div class="img_capa card">
                <span>
                    <div class="container">
                        <h2>Gestão patrimonial estratégica</h2>

                        <p>Preserve e aumente seu patrimônio através de estratégias personalizadas ao seu perfil, assegurando um legado duradouro</p>
                        <br>
                        <!-- <a href="#contact" class="cta-button">Entre em contato</a> -->
                    </div>
                </span>
                <img src="imgs/moedas.jpg" alt="foto_capa" class="img">
            </div>

        </div>

        <div class="div_nav-dots">
            <div class="nav-dots"></div>
        </div>
    </section>
    <div class="Flashlogin">

        <div class="section">
            <h1>Afinal, o que é a Gestão Financeira/Empresarial? </h1>
            <br>
            <p class="scroll_animado">Gestão financeira/empresarial é um conjunto das ações e procedimentos administrativos relacionados com o planejamento, execução,
                análise e controle das atividades financeiras do seu negócio. Simplificando: obter o melhor resultado <b> e o máximo de lucro </b> atividades da empresa com esforços inteligentes e eficientes;</p>
            <br>
            <h2> Qual nosso propósito: </h2>
            <br>
            <p class="scroll_animado">Nosso propósito fundamental é dar transparência às suas informações, eficiência nos processos, aumento de lucro e gestão/acompanhamento dos resultados;</p>
            <br>
            <p class="scroll_animado">Desenvolvemos um planejamento exclusivo, atendendo suas necessidades e seu perfil;</p>
            <br>
            <h2 class="scroll_animado">Preencha o formulário de apresentação e dê o próximo passo para o sucesso financeiro pessoal!
            </h2>
            <br>
            <a href="log_page.php?opcaosingUp">
                <button class="singup">
                    COMEÇAR AGORA
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>

                    </div>
                </button>
            </a>
        </div>
        <div class="div_b">
            <div class="blob_">
                <img src="imgs/computador-empresa.jpeg" alt="">
            </div>
        </div>

    </div>


    <section id="cards_beneficios">
        <img src="imgs/consultoria-financeira.webp" alt="" class="backImg">
        <div class="fundo_img"></div>
        <div class="container">
            <div class="section scroll_animado sectionFull">
                <h1>Tenha Ystrategy em sua organização</h1>
            </div>
            <br>
            <br>
            <br>
            <div class="service-items">
                <div class="card_info scroll_animado">
                    <div class="icon_card">
                        <img src="iconsJD/computador_lucro.png" class="img" alt="">
                    </div>
                    <h3>Para que serve:</h3>
                    <ul class="features">
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card"> garantir <strong>saúde financeira</strong>;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Fortalecer sua marca;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card"> Dar <strong> credibilidade </strong>perante o mercado;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Auxiliar nos processos decisórios;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Identificar riscos e oportunidades;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Gerar transparência da operação e dos processos;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card"><strong> Planejar a vida </strong>no longo prazo;</span>
                        </li>

                    </ul>



                </div>
                <div class="card_info scroll_animado">
                    <div class="icon_card">
                        <img src="iconsJD/conexoes.png" class="img" alt="">
                    </div>
                    <h3>Quais os peincipais benefícios:</h3>


                    <ul class="features">
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card"> Diminuição dos <strong> custos e despesas </strong> ;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Aumento de lucros e/ou margens;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Mitigar riscos;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Melhor produtividade</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card"><strong> Reduzir erros </strong> operacionais;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>Tomadas de decisões assertivas;</span>
                        </li>
                    </ul>
                </div>


                <div class="card_info scroll_animado">
                    <div class="icon_card">
                        <img src="iconsJD/lupa.png" class="img" alt="">
                    </div>
                    <h3>Como:</h3>

                    <ul class="features">
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Análise de perfil e objetivos;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Planejamento e controle orçamentário;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Gestão de custos e despesas;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Gestão do fluxo de caixa;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>Automatização e/ou sistematização de processos;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Análise de <strong> invstimentos e retornos </strong>;</span>
                        </li>
                        <li>
                            <span class="icon img">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                </svg>
                            </span>
                            <span class="txt_card">Elaboração de <strong> relatórios de suporte </strong>
                                administrativos /financeiros simplificados;</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </section>



    <div class="Flashlogin">
        <div class="div_b">

            <div class="blob_">
                <img src="imgs/computador-empresa.jpeg" alt="">
            </div>
        </div>

        <section id="services">
            <div class="container">

                <div class="service-items">
                    <a href="#avalie">
                        <div class="service-item scroll_animado">

                            <h3>Avalie suas particularidades</h3>
                            <p>Crie um planejamento exclusivo as suas necessidades, objetivos e visões</p>

                        </div>
                    </a>
                    <a href="#eficiencia">
                        <div class="service-item scroll_animado">
                            <h3>Garanta mais eficiência</h3>
                            <p>Otimize processos e evolua a gestão de seus negócios a um outro nível. </p>
                        </div>
                    </a>
                    <a>
                        <div class="service-item scroll_animado">
                            <h3>Tome decisões</h3>
                            <p>Baseie-se a partir de informações fidedignas com foco em resultados.</p>
                        </div>
                    </a>
                </div>

            </div>
        </section>
    </div>


    <div class="tutorial">
        <div class="section scroll_animado sectionFull">
            <h1>Como funciona a consultoria?</h1>
        </div>
        <img src="imgs/planejamento.jpg" alt="" class="backImg">
        <div class="fundo_img"></div>
        <!-- <div class="alingH scroll_animado">
            <img src="imgs/criarconta2.png" class="img">
            <div class="alingV">
                <h1>Crie uma conta facil e rápido</h1><br>
                <p>Insira suas informações para criar sua conta e aproveite todos os benefícios da consultoria para sua empresa</p>
            </div>
        </div> -->
        <div class="alingH scroll_animado">

            <div class="alingV">
                <h1>Apresente seu negócio</h1><br>
                <p>Apresente seu negócio de forma detalhada, destacando suas principais dificuldades. Entraremos em contato para oferecer as melhores soluções e oportunidades personalizadas para você!</p>
                <br>
                <br>
                <a href="log_page.php?opcaosingUp">
                    <button class="singup">
                        COMEÇAR AGORA
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>

                        </div>
                    </button>
                </a>
            </div>
            <img src="imgs/Chatting-amico (1).png" class="img">
        </div>
        <br>
        <br>
        <div class="alingH scroll_animado">
            <!-- <img src="imgs/grafico.png" class="img"> -->
            <img src="imgs/Data analysis-amico.png" class="img">

            <div class="alingV">
                <h1>Fazemos um diagnóstico preciso da sua empresa</h1><br>
                <p>Realizamos uma análise detalhada da sua situação atual e desenvolvemos planos de ação estratégicos, com foco em identificar oportunidades de melhoria e impulsionar o crescimento do seu negócio.</p>
            </div>
        </div>
        <div class="alingH scroll_animado">
            <div class="alingV">
                <h1>Execução do plano de ação</h1><br>
                <p>Chegou o momento de colocar tudo em prática! O plano de ação, cuidadosamente elaborado para o seu negócio, é executado com o nosso acompanhamento especializado, garantindo consultoria contínua e análise dos resultados obtidos.</p>
            </div>
            <img src="imgs/Process-amico (1).png" class="img">
        </div>
        <!-- <div class="alingH">
            <img src="imgs/Confirmed2.png" class="img">

            <div class="alingV">
                <h1>Confirme seu Agendamento</h1><br>
                <p>Revise os detalhes da sua consulta financeira e finalize a solicitação e pronto!- Você receberá um e-mail de confirmação com todas as informações necessárias</p>
            </div>
        </div> -->

    </div>


    <div class="detalhesBoxes" id="avalie">
        <div class="vertical-section">

            <h1>Avalie suas Particularidades</h1>

        </div>
        <div class="desc_conteudo">
            <h3>Na Ystrategy, valorizamos a singularidade de cada cliente, seja em financas pessoais ou empresarial. Entendemos que cada um possui características, objetivos e necessidades próprias. </h3>
            <br>
            <ul>
                <li><b>Entendimento Profundo:</b> Realizamos uma imersão completa na sua realidade financeira, seja pessoal ou empresarial, para captar a essência do seu perfil e identificar pontos fortes, oportunidades e desafios específicos.</li>
                <br>
                <li><b>Planejamento Personalizado: </b> Desenvolvemos um plano financeiro sob medida, alinhado às suas metas e aspirações, seja para crescimento empresarial, investimentos pessoais, ou planejamento de aposentadoria.</li>
                <br>
                <li><b>Alinhamento com Objetivos:</b>Nossas estratégias são criadas para atingir seus objetivos de curto, médio e longo prazo, garantindo que cada decisão tomada esteja em perfeita sintonia com suas ambições.</li>
                <br>
                <li><b> Flexibilidade e Adaptabilidade: </b>Adaptamos nossos planos conforme mudanças e novas oportunidades surgem, assegurando que você esteja sempre preparado para enfrentar as incertezas do mercado.</li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="detalhesBoxes" id="eficiencia">
        <div class="vertical-section">

            <h1>Garanta mais Eficiência</h1>

        </div>
        <div class="desc_conteudo">
            <h3>Nosso objetivo é otimizar os processos e elevar a gestão do seu negócio ou suas finanças pessoais a um novo patamar de eficiência. </h3>
            <br>
            <ul>
                <li><b>Otimização de Processos:</b> Identificamos gargalos e ineficiências, utilizando ferramentas avançadas para mapear seu fluxo de trabalho. Implementamos melhorias que reduzem custos, aumentam a produtividade e melhoram a qualidade dos resultados.</li>
                <br>
                <li><b>Implementação de Melhores Práticas: </b> Recomendamos e implementamos as melhores práticas de gestão financeira e operacional, incluindo novas tecnologias, automação e metodologias de gestão. Para empresas, isso pode envolver a revisão de cadeias de suprimentos e otimização de estoques. Para indivíduos, pode significar a organização de finanças pessoais e planejamento de investimentos.</li>
                <br>
                <li><b>Evolução Contínua: </b>Monitoramos constantemente os resultados das mudanças, ajustando estratégias conforme necessário para garantir eficiência contínua e responsividade às mudanças do mercado e novas oportunidades.</li>
                <br>
                <li><b>Resultados Mensuráveis: </b>Utilizamos métricas e indicadores de desempenho para medir o impacto das nossas iniciativas. Fornecemos uma visão clara dos benefícios obtidos, como redução de custos, aumento de produtividade, melhoria na qualidade do serviço e crescimento da rentabilidade.</li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="detalhesBoxes" id="eficiencia">
        <div class="vertical-section">

            <h1>Tome Decisões Informadas</h1>

        </div>
        <div class="desc_conteudo">
            <h3>Na Ystrategy, fornecemos informações precisas e confiáveis para apoiar suas decisões estratégicas, tanto para empresas quanto para indivíduos.</h3>
            <br>
            <ul>
                <li><b>Informações Confiáveis:</b> Utilizamos fontes de dados atualizadas e confiáveis, oferecendo análises de mercado, relatórios financeiros e indicadores econômicos para empresas e análises de gastos, rendimentos e investimentos para indivíduos.</li>
                <br>
                <li><b>Análises Rigorosas: </b> Realizamos análises aprofundadas utilizando técnicas avançadas de análise financeira para identificar tendências e prever cenários futuros, dando uma visão clara e abrangente da sua situação financeira.</li>
                <br>
                <li><b>Foco em Resultados: </b>Nossas recomendações são focadas em resultados mensuráveis, ajudando a definir metas claras e estratégias para alcançá-las, seja otimizando custos e aumentando receitas para empresas ou maximizando retornos e planejando para a aposentadoria para indivíduos.</li>
                <br>
                <li><b>Tomada de Decisão Estratégica: </b>Oferecemos suporte contínuo com insights e recomendações baseadas em dados, garantindo que suas decisões sejam bem fundamentadas e alinhadas com seus objetivos de longo prazo.</li>
            </ul>
        </div>
    </div>


    <?php
    include('rodape.php');
    ?>
    </div>
</body>

</php>