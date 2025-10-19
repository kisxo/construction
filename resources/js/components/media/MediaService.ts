import axios from 'axios'

export const getAllMedia = async () => {
  const { data } = await axios.get('/media')
  return data.data || data
}

export const uploadMedia = async (form: FormData) => {
  const { data } = await axios.post('/media', form, {
    headers: { 'Content-Type': 'multipart/form-data' },
  })
  return data
}
