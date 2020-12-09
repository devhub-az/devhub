import marked from 'marked'
import emoji from 'node-emoji'

export function parse (markdown) {
    const replacer = (match) => emoji.emojify(match);
    markdown = markdown.replace(/(:.*:)/g, replacer);

    return marked(markdown)
}
