import editorjsColumns from '@calumk/editorjs-columns';
import Checklist from '@editorjs/checklist';
import CodeTool from '@editorjs/code';
import Delimiter from '@editorjs/delimiter';
import EditorJS from '@editorjs/editorjs';
import Embed from '@editorjs/embed';
import Header from '@editorjs/header';
import InlineCode from '@editorjs/inline-code';
import LinkTool from '@editorjs/link';
import List from '@editorjs/list';
import Marker from '@editorjs/marker';
import Quote from '@editorjs/quote';
import SimpleImage from '@editorjs/simple-image';
import Table from '@editorjs/table';
import Warning from '@editorjs/warning';



const default_tools = {
  header: {
    class: Header,
    inlineToolbar: ['marker', 'link'],
    config: {
      placeholder: 'Header'
    },
    shortcut: 'CMD+SHIFT+H'
  },
  image: SimpleImage,
  list: {
    class: List,
    inlineToolbar: true,
    shortcut: 'CMD+SHIFT+L'
  },
  checklist: {
    class: Checklist,
    inlineToolbar: true,
  },
  quote: {
    class: Quote,
    inlineToolbar: true,
    config: {
      quotePlaceholder: 'Enter a quote',
      captionPlaceholder: 'Quote\'s author',
    },
    shortcut: 'CMD+SHIFT+O'
  },
  warning: Warning,
  marker: {
    class: Marker,
    shortcut: 'CMD+SHIFT+M'
  },
  code: {
    class: CodeTool,
    shortcut: 'CMD+SHIFT+C'
  },
  delimiter: Delimiter,
  inlineCode: {
    class: InlineCode,
    shortcut: 'CMD+SHIFT+C'
  },
  linkTool: LinkTool,
  embed: Embed,
  table: {
    class: Table,
    inlineToolbar: true,
    shortcut: 'CMD+ALT+T'
  },
}

const columns = {
  class: editorjsColumns,
  config: {
    tools: { ...default_tools },
    EditorJsLibrary: EditorJS
  }
}

const tools = {
  ...default_tools,
  columns
}

export { tools };
