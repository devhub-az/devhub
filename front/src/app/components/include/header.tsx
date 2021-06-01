console.log('oooooooooo.                         ooooo   ooooo              .o8      \n' +
    '`888\'   `Y8b                        `888\'   `888\'             "888      \n' +
    ' 888      888  .ooooo.  oooo    ooo  888     888  oooo  oooo   888oooo.     Using DevHub at work? Work for Devhub.\n' +
    ' 888      888 d88\' `88b  `88.  .8\'   888ooooo888  `888  `888   d88\' `88b     https://github.com/hose1021/DevHub\n' +
    ' 888      888 888ooo888   `88..8\'    888     888   888   888   888   888\n' +
    ' 888     d88\' 888    .o    `888\'     888     888   888   888   888   888            Made with ❤ by Hose\n' +
    'o888bood8P\'   `Y8bod8P\'     `8\'     o888o   o888o  `V88V"V8P\'  `Y8bod8P\'')

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
        <header className="bg-white dark:bg-gray-800 sm:px-4 md:px-4 xs:px-4">
            <div className="flex items-center justify-between h-12 lg:container mx-auto">
                <div className="flex xs:w-max space-x-3 xs:space-x-0 xs:flex items-center">
                    <div id="logo" className="flex items-center justify-center">
                        <NavLink to="/"  className="flex items-center space-x-2">
                            <img src="/images/DevHub_Chrome_Full_Logo.svg" alt="DevHub Logo"
                                 className="h-8 xs:h-9 hidden dark:block"/>
                            <img src="/images/DevHub_Monochrome_Full_Logo.svg" alt="DevHub Logo"
                                 className="h-8 xs:h-9 dark:hidden"/>
                        </NavLink>
                    </div>
                    <ul className="grid relative grid-flow-col font-medium text-sm space-x-3 md:hidden sm:hidden xs:hidden items-center justify-center">
                        <li>
                            <NavLink exact to="/" activeClassName="border-b-2 border-cerulean-100 hover:text-black dark:text-gray-300"
                                     className="hover:border-b-2 trans-none hover:border-cerulean-100 pb-1 font-semibold">
                                Главная
                            </NavLink>
                        </li>
                        <li>
                            <NavLink to="/"
                                     className="hover:border-b-2 trans-none hover:border-cerulean-100 pb-1 font-semibold">
                                Хабы
                            </NavLink>
                        </li>
                        <li>
                            <NavLink to="/"
                                     className="hover:border-b-2 trans-none hover:border-cerulean-100 pb-1 font-semibold">
                                Авторы
                            </NavLink>
                        </li>
                        <li>
                            <NavLink to="/about" activeClassName="border-b-2 border-cerulean-100 hover:text-black dark:text-gray-300"
                                     className="hover:border-b-2 trans-none hover:border-cerulean-100 pb-1 font-semibold">
                                О нас
                            </NavLink>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    );
}

export default Header;
