import React, {useState} from 'react';
import {NavLink} from 'react-router-dom';

const Header: React.FunctionComponent = () => {
    // const [title, setTitle] = useState<string>("");
    // const changeHandler = (event: React.ChangeEvent<HTMLInputElement>) => {
    // setTitle(event.target.value);
    // setTitle(prev => {
    //     return prev+event.target.value;
    // });
    // }

    //{window.location.pathname}

    return (
        <footer className="body-font bg-white dark:bg-dpaper border-t dark:border-gray-700 pt-6 mt-auto w-full">
            <div className="xs:h-auto lg:container mx-auto">
                <div className="mb-8 w-32 xs:mx-auto">
                    <NavLink to="/"
                       className="font-medium text-gray-100 xs:pb-4 w-32">
                        <img src="/images/DevHub_Chrome_Full_Logo.svg" alt="DevHub Logo"
                             className="h-8 xs:h-9 hidden dark:block"/>
                        <img src="/images/DevHub_Monochrome_Full_Logo.svg" alt="DevHub Logo"
                             className="h-8 xs:h-9 dark:hidden"/>
                    </NavLink>
                </div>
                <div className="flex xs:block">
                    <div className="items-start flex w-2/3 justify-between xs:block xs:w-full xs:px-4 xs:space-y-4">
                        <div className="flex flex-col">
                            <h3 className="dark:text-gray-300 font-medium mb-2">DevHub</h3>
                            <ul className="space-y-2">
                                <li>
                                    <a href="#"
                                       className="text-gray-500 hover:text-black dark:hover:text-gray-300 cursor-pointer">О
                                        проекте</a>
                                </li>
                                <li>
                                    <a href="#"
                                       className="text-gray-500 hover:text-black dark:hover:text-gray-300 cursor-pointer">Обновления</a>
                                </li>
                            </ul>
                        </div>
                        <div className="flex flex-col">
                            <h3 className="dark:text-gray-300 font-medium mb-2">Информация</h3>
                            <ul className="space-y-2">
                                <li>
                                    <a href="#"
                                       className="text-gray-500 hover:text-black dark:hover:text-gray-300 cursor-pointer">Как
                                        стать автором</a>
                                </li>
                                <li>
                                    <a href="#"
                                       className="text-gray-500 hover:text-black dark:hover:text-gray-300 cursor-pointer">Правила</a>
                                </li>
                            </ul>
                        </div>
                        <div className="flex flex-col">
                            <h3 className="dark:text-gray-300 font-medium mb-2">Помощь</h3>
                            <ul className="space-y-2">
                                <li>
                                    <a href="#"
                                       className="text-gray-500 hover:text-black dark:hover:text-gray-300 cursor-pointer">Вопрос
                                        & Ответ</a>
                                </li>
                                <li>
                                    <a href="#"
                                       className="text-gray-500 hover:text-black dark:hover:text-gray-300 cursor-pointer">Сообщить
                                        об ошибке</a>
                                </li>
                                <li>
                                    <a href="#"
                                       className="text-gray-500 hover:text-black dark:hover:text-gray-300 cursor-pointer">Пожертвовать</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="footer" className="w-1/5 ml-auto xs:ml-0 xs:w-full xs:px-4 xs:pt-4">
                        <h3 className="dark:text-gray-300 font-medium mb-4">Язык & Тема</h3>
                        <div className="space-y-4">

                        </div>
                    </div>
                </div>
                <div className="my-6 border-t border-gray-300 dark:border-gray-700 opacity-75 xs:w-full xs:px-4"></div>
                <div className="flex justify-between xs:w-full xs:px-4 pb-4">
                    <p className="block text-sm text-gray-500 pb-4 my-auto xs:p-0 xs:text-center">
                        &copy; 2019 – 2021 «DevHub»
                    </p>
                    <div className="flex space-x-4 justify-center">
                        <NavLink to="#">
                            <span className="iconify text-2xl text-gray-400 hover:text-black dark:hover:text-gray-300"
                                  data-icon="ant-design:github-filled" data-inline="false"></span>
                        </NavLink>
                        <NavLink to="#">
                            <span className="iconify text-2xl text-gray-400 hover:text-black dark:hover:text-gray-300"
                                  data-icon="cib:telegram"
                                  data-inline="false"></span>
                        </NavLink>
                    </div>
                </div>
            </div>
        </footer>
);
}

export default Header;
