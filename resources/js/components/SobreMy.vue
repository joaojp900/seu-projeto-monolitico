<template>
    <section class="sobre">
    <div class="interface">
        <div class="flex">
            <div class="img-sobre">
                <img src="/img/asd.jpg" alt="">
            </div><!--img-sobre-->

            <div class="txt-sobre">
                <h2>Muito Prazer,<span>SOU JOÃO PEDRO GABRIEL.</span></h2>
                <p>Possuo formação técnica em Análise e Desenvolvimento de Sistemas e atualmente estou cursando Ciência da Computação, <br> onde sigo expandindo meus conhecimentos e habilidades. <br> Durante minha jornada acadêmica, participei de diversos projetos práticos que me permitiram adquirir <br> experiência em programação, <br> modelagem de banco de dados e desenvolvimento web. <br> Esses projetos acadêmicos foram fundamentais para consolidar uma base sólida, <br> que continuo  a fortalecer enquanto enfrento novos desafios na área de tecnologia.</p>
                 
                <div class="btn-social">
                    <a href="https://github.com/joaojp900"><button>G</button></a>
                    <a href="https://www.linkedin.com/in/joao-pedro-gabriel/"><button>L</button></a>
                </div>
            </div><!--img-Sobre-->

        </div><!--flex-->
    </div><!--interface-->
    </section><!--Sobre-->
</template>
 
<style scoped>
section.sobre{
    padding: 40px 4%;
    background-color:#333 ;
}
section.sobre .flex{
    align-items: center;
    gap: 60px;
}
.sobre .txt-sobre{
   color: #fff; 
}
.sobre .txt-sobre h2{
    font-size: 40px;
    line-height: 40px;
    margin-bottom: 30px;
}
.sobre .txt-sobre h2 span{
    color: #00ff08;
    display: block;
}
.sobre .txt-sobre p{
    margin: 20px 0;
    text-align: justify;
}
.sobre .txt-sobre .btn-social button{
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: none;
    background-color: #00ff08;
    font-size: 22px;
    cursor: pointer;
    margin: 0 5px;
    transition: .2s;
}
button:hover{
    box-shadow: 0px 0px 8px #00ff08;
    transform: scale(1.05);
}


</style>