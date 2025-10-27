import { createGlobalState } from '@vueuse/core'
import { shallowRef } from 'vue'

interface Props {
  elementSlug: string
  elementTitle: string
}


export const useEditorState = createGlobalState(
  () => {
    // state
    const editorOpen = shallowRef(false)
    const resourceData = shallowRef({
        elementSlug: '',
        elementTitle: '',
        pageUrl: ''
    })

    function openEditor(elementSlug: string, elementTitle: string, pageUrl: string) {
        resourceData.value.elementSlug = elementSlug;
        resourceData.value.elementTitle = elementTitle;
        resourceData.value.pageUrl = pageUrl;
        editorOpen.value = true;
    }

    function closeEditor() {
      editorOpen.value = false;
    }

    return { editorOpen, resourceData, openEditor, closeEditor }
  }
)