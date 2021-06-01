import React from 'react';
import {Helmet} from "react-helmet";

const About: React.FunctionComponent = () => {
    return (
        <>
            <Helmet>
                <title>About page!</title>
            </Helmet>
            <div className="relative">
                <div className="relative w-full py-24 bg-cover bg-center xs:bg-left">
                    <div className="relative flex flex-col text-center w-full mb-12 text-white text-center py-6">
                        <div className="w-1/3 md:w-full sm:w-full xs:w-full px-2 mx-auto">
                            <p className="text-4xl"><span className="font-medium">DevHub</span>-a xoş gəlmisiniz</p>
                            <img src="images/DevHub_Compact_Logo.svg" alt="Logo image" width="158"
                                 className="mx-auto py-8 xs:w-3/12"/>
                            <p className="leading-6 text-shadow">
                                <span className="font-medium">DevHub</span>-ın əsas vəzifəsi Azərbaycan
                                proqramçılarının təcrübələri və uğurlarını
                                digər proqramçılar ilə bölüşməsinə kömək etməkdir.
                            </p>
                        </div>
                    </div>
                </div>
                <section
                    className="xl:container my-20 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto overflow-hidden xs:px-4">
                    <div className="flex space-x-10 rounded-xl w-full px-12 py-12 xs:block"
                         style={{background: "linear-gradient(161deg, rgba(64, 229, 255, 0.5), rgba(20, 91, 252, 0.5)) rgb(107 107 107)"}}>
                        <div className="w-4/6 xs:w-full">
                            <div className="py-4 text-white flex space-x-2">
                                <span className="iconify text-2xl text-white" data-icon="mdi:pen" data-inline="false"/>
                                <h1 className="text-xl font-semibold">Niyə paylaşma yazmaq faydalıdı?</h1>
                            </div>
                            <ul className="list-decimal space-y-2 ml-5 font-light text-white">
                                <li>
                                    <p className="leading-relaxed text-white">
                                        Написать пост — значит как следует разложить всё по полочкам, обобщить опыт и
                                        поделиться им с другими. Приносить пользу чертовски приятно, попробуйте.
                                    </p>
                                </li>
                                <li>
                                    <p className="leading-relaxed text-white">
                                        Никогда не угадаешь, кто прочитает ваш пост. Часто это те, кто разбирается в
                                        вопросе
                                        на голову лучше вас. Фидбэк от таких людей — возможно, самое ценное, что вы
                                        приобретете на Девхабе.
                                    </p>
                                </li>
                                <li>
                                    <p className="leading-relaxed text-white">
                                        Ваши публикации — это ваша репутация. Они лучше резюме расскажут, кто вы, чем
                                        занимаетесь и в чем разбираетесь.
                                    </p>
                                </li>
                                <li>
                                    <p className="leading-relaxed text-white">
                                        За первый крутой пост вы получите полноправный аккаунт и плюс в карму.
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div className="h-full w-2/6 m-auto xs:w-full xs:mt-4">
                            <img className="z-10 m-auto"
                                 src="images/about/pro.svg"
                                 alt="" height="353" width="232"/>
                        </div>
                    </div>
                </section>
                <section
                    className="flex space-x-5 xl:container my-20 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto overflow-hidden xs:block xs:space-y-4 xs:space-x-0 px-4">
                    <div className="rounded-xl w-full px-12 pt-12" data-aos="fade-up"
                         style={{background: "linear-gradient(rgba(241, 235, 235, 0.95), rgba(240, 240, 240, 0.9)) rgb(90 130 242)"}}>
                        <span className="iconify text-5xl text-cerulean-100" data-icon="gg:feed" data-inline="false"/>
                        <h1 className="text-xl py-4 font-semibold text-cerulean-100">
                            Mən necə müəllif ola bilərəm?
                        </h1>
                        <p className="text-black font-semibold text-xl">
                            На Девхабе интересуются IT и всеми сторонами современной жизни: программированием,
                            технологиями,
                            дизайном, наукой, образованием, играми, карьерой, здоровьем. Не обязательно писать
                            хардкорно, но
                            важно, чтобы была польза.
                            <span className="text-gray-500">
                                Если у вас уже есть крутой материал на другой площадке, запостите его
                                и здесь, чтобы сообщество Девхаба тоже его оценило.
                            </span>
                        </p>
                        <div className="relative mt-12 w-1/2 mx-auto xs:w-full">
                            <img className="relative z-10" style={{top: "3.45745%; left: 5.51471%"}}
                                 src="images/about/post.svg"
                                 alt="" height="353" width="232"/>
                        </div>
                    </div>
                    <div className="rounded-xl w-full px-12 pt-12" data-aos="fade-up"
                         style={{background: "conic-gradient(from 90deg at 50% 0%, #353535, 50%, #222, #111)"}}>
                        <span className="iconify text-5xl text-cerulean-100" data-icon="gg:feed" data-inline="false"/>
                        <h1 className="text-xl py-4 font-semibold text-cerulean-100">Как писать классно</h1>
                        <p className="text-white font-semibold text-xl">
                            На случай, если вы не знаете, как подступиться к тому или иному формату, мы написали
                            короткие гайды,
                            о том, как сделать ваши материалы полезными и оформить так, чтобы было удобно читать.
                            <span className="text-gray-400">Лента помогает отслеживать за интересными новшествами в мире
                                IT.</span>
                        </p>
                        <div className="relative w-1/2 mt-12 mx-auto">
                            <img className="relative z-10" src="images/about/iphone_cut.png"
                                 alt="Android" height="376" width="272"/>
                            <img className="absolute" style={{top: "3.45745%", left: "5.51471%", width: "88.9706%"}}
                                 src="images/about/home_m.png"
                                 alt="" height="353" width="232"/>
                        </div>
                    </div>
                </section>
            </div>
        </>
    );
}

export default About;
