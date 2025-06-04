<template>
    <main>
        <section class="topo-do-site">
            <div class="intercae">
                <div class="flex">
                    <div class="txt-topo-site">
                        <h1>Desenvolvo soluções inteligentes e
                            escaláveis para impulsionar negócios. Se busca um parceiro para
                            transformar tecnologia em resultados, estou pronto para o desafio!<span>.</span></h1>

                            <p>paixão por transformar desafios em soluções tecnológicas eficientes e escaláveis. Minha jornada na programação começou
                             com a curiosidade de entender como os sistemas funcionam e evoluiu para um compromisso sólido com a criação de aplicações
                             robustas, seguras e de alto desempenho.</p>
                             
                        </div> <!--Txt-topo-site-->
                    <div class="img-topo-site">
                        <img src="/img/imgs.jpg" alt="">
                        <!--Aqui adiciona imagem-->
                    </div> 
                </div>
            </div><!--Interface-->
        </section><!--topo do site-->


    </main>
</template>

<script>

</script>

<style >
section.topo-do-site{
    padding: 40px 4%;
    background-color: #333;
}
.flex{
    display: flex;
}
section.top-do-site .flex{
    align-items: center;
    justify-content: center;
    gap: 90px;
}
.topo-do-site h1{
    color:white;
    font-size: 42px;
    line-height: 40px;
}
.topo-do-site h1 span{
     color: #00ff08; /*Span */
}
p{
    color: white;
}
.topo-do-site .txt-topo-dite p{
    color: #fff;
    margin: 0 40px;
}
.btn-contato button{
    margin-top: 25px;
    padding: 10px 40px;
    font-size: 18px;
    font-weight: 600;
    background-color: white;
    border: 0;
    border-radius: 30px;
    cursor: pointer;
}
.btn-contato button:hover{
    box-shadow: 0px 0px 8px black;
    transform: scale(1.05);
}
.topo-do-site .img-topo-site img{
    position: relative;
    animation: flutuar 2s ease-in-out infinite alternate;
}
img{
    margin-left: 50px;
    max-width: 70%;
    height: auto;
    border-radius: 25px;
}
@keyframes flutuar{
    0%{
        top: 0%;
    }
    100%{
        top: 30px;
    }
}
/*Estilo das Especialidades */
.especialidades{
    background-color: #333;
    padding: 40px 4%;
}
h2.titulo{
    color: black;
    font-size: 38px;
    text-align: center;
}
h2.titulo span{
    color: #00ff08;
}
section.espcialidades{
    padding: 40px 4%;
}
section .especialidades .flex{
    gap: 60px;
}

.especialidades .especialidades-box{
    color: #fff;
    padding: 40px;
    border-radius:20px ;
    margin-top: 25px;
}
.especialidades .especialidades-box:hover{
    transform: scale(1.05);
    box-shadow: 0 0 8px black;
}
.especialidades .especialidades-box i{
    font-size: 70px;
    color: #00ff08;
}
.especialidades .especialidades-box p{
    font-size: 28px;
    margin: 15px 0;
}
header > .interface{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
</style>