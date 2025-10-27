export interface MediaItem {
  id: number
  uuid: string
  original_name: string
  filename: string
  path: string
  disk: string
  mime_type: string
  extension: string | null
  size: number
  width: number
  height: number
  duration: number | null
  variants?: {
    small?: string
    medium?: string
    large?: string
  }
  folder_id?: number | null
  is_public?: boolean
  meta?: Record<string, any> | null
  created_at?: string
  updated_at?: string
  deleted_at?: string | null
}