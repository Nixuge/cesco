import React, { useState } from 'react';
import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';
import BasicButton from '@/components/basicButton';
import { useRouter } from 'next/router';

interface FormData {
  content: string;
}

const PostForm: React.FC = () => {
  const router = useRouter();
  const [formData, setFormData] = useState<FormData>({
    content: '',
  });

  const handleChange = (e: React.ChangeEvent<HTMLTextAreaElement>) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    try {
      const response = await fetch('/api/newPost', {
        method: 'POST',
        body: JSON.stringify(formData),
        headers: {
          'Content-Type': 'application/json',
        },
      });

      if (response.ok) {
        const result = await response.json();
        console.log(result);

        router.push("/")
      } else {
        throw new Error('Failed to create post');
      }
    } catch (error) {
      console.error(error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <textarea name="content" value={formData.content} onChange={handleChange} />
      <button type="submit">Publish !</button>
    </form>
  );
};

export default PostForm;
