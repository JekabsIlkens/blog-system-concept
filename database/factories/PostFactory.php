<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return 
        [
            'title' => "Life hacks for " . fake()->jobTitle(),
            'body' => fake()->randomElement([
                "Gratitude is the practice of acknowledging and appreciating the good things in life, and it is essential to cultivating a sense of joy and contentment. Whether it's expressing gratitude for small acts of kindness or for the simple pleasures of life, gratitude can bring a sense of peace and happiness to our lives. One of the most important ways that technology is changing our relationship with nature is by making it more accessible. From nature webcams to virtual reality experiences, we can now explore and experience the natural world from the comfort of our own homes. This accessibility is helping to raise awareness about the importance of conservation and inspire a new generation of environmental advocates.",
                "The use of nanotechnology in environmental remediation is another innovative application of technology in nature. Nanotechnology can be used to create more effective and efficient methods for cleaning up pollutants and restoring damaged ecosystems. The city was alive with the sound of honking horns and bustling people. It was as if everyone was in a hurry, rushing to their next destination. But amidst the chaos, I found a quiet park where I could sit and watch the world go by. The trees rustled in the breeze and the birds sang, creating a peaceful oasis in the midst of the city.",
                "Honesty is the practice of speaking and acting truthfully and with integrity, and it is essential to building trust and respect in our relationships. Whether it's being honest with ourselves and others about our thoughts and feelings, admitting our mistakes and shortcomings, or communicating clearly and transparently, honesty can create a sense of authenticity and connection in our interactions with others. The snow fell softly from the sky, covering everything in a blanket of white. It was like the world had been transformed into a winter wonderland. I bundled up and went for a walk, enjoying the peacefulness that comes with a fresh snowfall.",
                "Integrity is the practice of living in alignment with our values and beliefs, and it is essential to building trust and respect with others. Whether it's keeping our promises and commitments, speaking and acting authentically, or holding ourselves accountable for our actions and decisions, integrity can help us live with greater purpose and meaning. The trend of experiential gifts over material possessions is on the rise. Instead of giving someone a physical item, people are opting to give experiences like concert tickets or cooking classes.",
                "The development of regenerative agriculture practices is another important application of technology and nature. Regenerative agriculture practices promote soil health and biodiversity, reducing the environmental impact of agriculture and promoting more sustainable food production. Compassion is the act of showing kindness, care, and concern to others, especially those who are suffering, and it is essential to building a more compassionate and caring world. Whether it's offering a listening ear, providing support and encouragement, or engaging in acts of service and volunteerism, compassion can bring comfort and healing to those in need.",
                "One of the most important ways that technology is changing our relationship with nature is by making it more accessible. From nature webcams to virtual reality experiences, we can now explore and experience the natural world from the comfort of our own homes. This accessibility is helping to raise awareness about the importance of conservation and inspire a new generation of environmental advocates. Honesty is the practice of speaking and acting truthfully and with integrity, and it is essential to building trust and respect in our relationships. Whether it's being honest with ourselves and others about our thoughts and feelings, admitting our mistakes and shortcomings, or communicating clearly and transparently, honesty can create a sense of authenticity and connection in our interactions with others.",
            ]),
            'created_at' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'updated_at' => now(),
            'author_id' => User::factory()
        ];
    }
}
