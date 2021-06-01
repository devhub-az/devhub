import React from 'react';

const ServerError: React.FunctionComponent = () => {
    return(
        <>
            <main className="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4">
                <div className="text-center flex flex-col justify-center items-center space-y-2 m-auto h-96">
                    <h1 className="text-8xl font-medium dark:text-gray-300"><span className="iconify inline-block" data-icon="openmoji:skull-and-crossbones" data-inline="true"></span> 500</h1>
                    <h2 className="text-2xl font-medium dark:text-gray-300">Oops! There was internal server error</h2>
                    <p className="font-light dark:text-gray-400 w-2/3">Don't worry, our development team have automaticaly been notified of this
                        issue and they are working on it. Please try again in few minutes.</p>
                </div>
            </main>
        </>
    );
}

export default ServerError;