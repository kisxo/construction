import axios from 'axios'

export const getAllMedia = async () => {
  const res = await axios.get('/media')
  return res.data.data.map((m: any) => ({
    ...m,
    url: m.disk === 's3'
      ? `${import.meta.env.VITE_MINIO_ENDPOINT}/${m.path}`
      : `/storage/${m.path}`,
    type: m.mime_type.startsWith('image/')
      ? 'image'
      : m.mime_type.startsWith('video/')
      ? 'video'
      : m.mime_type.startsWith('audio/')
      ? 'audio'
      : 'document',
    name: m.original_name
  }))
}

export const uploadMedia = async (form: FormData) => {
  const { data } = await axios.post('/media', form, {
    headers: { 'Content-Type': 'multipart/form-data' },
  })
  return data
}
