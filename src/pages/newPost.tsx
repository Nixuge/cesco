import React, { useState } from 'react';
import { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/lib/prisma';

interface FormData {
  content: string;
}

const PostForm: React.FC = () => {
  const [formData, setFormData] = useState<FormData>({
    content: '',
  });

  const handleChange = (e: React.ChangeEvent<HTMLTextAreaElement>) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    try {
      const response = await fetch('/api/posts', {
        method: 'POST',
        body: JSON.stringify(formData),
        headers: {
          'Content-Type': 'application/json',
        },
      });

      if (response.ok) {
        const result = await response.json();
        console.log(result);
      } else {
        throw new Error('Failed to create post');
      }
    } catch (error) {
      console.error(error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Content:
        <textarea name="content" value={formData.content} onChange={handleChange} />
      </label>
      <button type="submit">Submit</button>
    </form>
  );
};

export default PostForm;
