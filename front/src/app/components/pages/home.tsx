import React from 'react';
import {NavLink} from 'react-router-dom';
import moment from 'moment'
import axios from 'axios';
import edjsHTML from 'editorjs-html';

const edjsParser = edjsHTML();

export default class Home extends React.Component {
    state = {
        loading: true,
        error: "",
        articles: []
    };
    loadData = () => {
        this.setState({loading: true});
        return axios
            .get(
                'http://127.0.0.1:8090/api/articles?page=' + '1'
            )
            .then(({data}) => {
                this.setState({
                    articles: data.data,
                    loading: false,
                    error: false
                });
            })
            .catch(error => {
                console.error("error: ", error);
                this.setState({
                    // objects cannot be used as a react child
                    // -> <p>{error}</p> would throw otherwise
                    error: `${error}`,
                    loading: false
                });
            });
    };

    createMarkup(block: string) {
        if (block.length > 700)
            block = block.slice(0, 600) + '...';
        return {__html: block};
    };

    componentDidMount() {
        this.loadData();
    }

    render() {
        const {loading, error, articles} = this.state;
        if (loading) {
            return <p>Loading ...</p>;
        }
        if (error) {
            return (
                <p>
                    There was an error loading the repos.{" "}
                    <button onClick={this.loadData}>Try again</button>
                </p>
            );
        }
        return (
            <>
                <div className="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4"
                     id="app">
                    <div className="flex space-x-3 xs:space-x-0 xs:block">
                        <div className="w-left xs:w-full">
                            <div className="space-y-3">
                                {articles.map((article: { relationships: { author: { data: { attributes: { username: string; avatar: string | undefined; }; }; }; comments: { data: string | any[]; }; }; attributes: { created_at: any; slug: string; title: boolean | React.ReactChild | React.ReactFragment | React.ReactPortal | null | undefined; body: string; views: boolean | React.ReactChild | React.ReactFragment | React.ReactPortal | null | undefined; }; }) =>
                                    <div key={article.id} className="w-full rounded border bg-white dark:bg-dpaper dark:border-gray-700">
                                        <div className="px-3.5">
                                            <div className="flex items-center align-middle pt-3">
                                                <NavLink
                                                    to={'/@' + article.relationships.author.data.attributes.username}
                                                    className="inline-flex no-underline author-popover"
                                                    title="Paylaşmanın müəllifi">
                                                    <img height="32" width="32"
                                                         alt="user avatar"
                                                         className="w-6 h-6 flex-none image-fit rounded lazyload"
                                                         src={article.relationships.author.data.attributes.avatar}/>
                                                    <p className="text-sm pl-2 m-auto dark:text-gray-300">
                                                        {'@' + article.relationships.author.data.attributes.username}</p>
                                                </NavLink>
                                                <p className="text-xs my-auto mr-auto pl-2 dark:text-gray-300">
                                                    {moment(article.attributes.created_at).format('D MMMM, HH:mm')}
                                                </p>
                                            </div>
                                            <div className="grid grid-flow-col py-2">
                                                <NavLink to={'/article/' + article.attributes.slug}
                                                         className="my-auto text-2xl xs:text-xl dark:text-gray-300">
                                                    {article.attributes.title}
                                                </NavLink>
                                            </div>
                                            <div className="prose my-2 xs:hidden md:hidden sm:hidden">
                                                {edjsParser.parse(JSON.parse(article.attributes.body)).slice(0, 2).map((body: string) =>
                                                    <div key={body}
                                                        dangerouslySetInnerHTML={this.createMarkup(body)}
                                                        className="break-words"/>
                                                )}
                                            </div>
                                        </div>
                                        <div
                                            className="grid lg:grid-cols-main rounded-b border-t dark:border-gray-700 py-3 px-3.5 mt-2">
                                            <div
                                                className="flex xs:justify-between items-center md:justify-between sm:justify-between space-x-10">
                                                <div className="flex items-center">
                                                    <i className="iconify text-gray-500 dark:text-gray-300"
                                                       data-icon="tabler:eye"/>
                                                    <p className="ml-1 text-gray-500 dark:text-gray-300">
                                                        {article.attributes.views}
                                                    </p>
                                                </div>
                                                <div>
                                                    <NavLink to={'/article/' + article.attributes.slug + '#comments'}
                                                             className="flex items-center">
                                                        <i className="iconify text-gray-500 dark:text-gray-300"
                                                           data-icon="tabler:message"/>
                                                        <p className="ml-1 text-gray-500 dark:text-gray-300">
                                                            {article.relationships.comments.data.length}
                                                        </p>
                                                    </NavLink>
                                                </div>
                                                <span className="iconify text-gray-500 dark:text-gray-300"
                                                      data-icon="tabler:device-floppy" data-inline="false"/>
                                                <div className="flex items-center cursor-pointer">
                                                    <span className="iconify text-gray-500 dark:text-gray-300"
                                                          data-icon="tabler:share" data-inline="false"/>
                                                </div>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                    </div>
                                )}
                            </div>
                        </div>
                        <div className="w-right xs:w-full">
                            2
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
