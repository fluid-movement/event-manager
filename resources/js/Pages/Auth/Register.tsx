import { useEffect, FormEventHandler } from "react";
import InputError from "@/Components/InputError";
import { Head, Link, useForm } from "@inertiajs/react";
import {
    PersonIcon,
    LockClosedIcon,
    ArrowRightIcon,
} from "@radix-ui/react-icons";
import {
    Box,
    TextField,
    Text,
    Flex,
    Checkbox,
    Button,
    Separator,
    Container,
    Link as RadixLink,
} from "@radix-ui/themes";

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        remember: false,
    });

    useEffect(() => {
        return () => {
            reset("password", "password_confirmation");
        };
    }, []);

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route("register"));
    };

    console.log(data);

    return (
        <>
            <Head title="Register" />

            <Container size="1">
                <Box py="9">
                    <form onSubmit={submit}>
                        <Box>
                            <TextField.Root>
                                <TextField.Slot>
                                    <PersonIcon height="16" width="16" />
                                </TextField.Slot>
                                <TextField.Input
                                    placeholder="Username"
                                    type="name"
                                    name="name"
                                    size="3"
                                    onChange={(e) =>
                                        setData("name", e.target.value)
                                    }
                                    autoComplete="name"
                                />
                            </TextField.Root>

                            <InputError
                                message={errors.name}
                                className="mt-2"
                            />
                        </Box>

                        <Box className="mt-4">
                            <TextField.Root>
                                <TextField.Slot>
                                    <PersonIcon height="16" width="16" />
                                </TextField.Slot>
                                <TextField.Input
                                    placeholder="Email"
                                    type="email"
                                    name="email"
                                    size="3"
                                    onChange={(e) =>
                                        setData("email", e.target.value)
                                    }
                                    autoComplete="email"
                                />
                            </TextField.Root>
                        </Box>

                        <Box className="mt-4">
                            <TextField.Root>
                                <TextField.Slot>
                                    <LockClosedIcon height="16" width="16" />
                                </TextField.Slot>
                                <TextField.Input
                                    placeholder="Password"
                                    type="password"
                                    name="password"
                                    size="3"
                                    onChange={(e) =>
                                        setData("password", e.target.value)
                                    }
                                />
                            </TextField.Root>
                        </Box>

                        <Box className="mt-4">
                            <TextField.Root>
                                <TextField.Slot>
                                    <LockClosedIcon height="16" width="16" />
                                </TextField.Slot>
                                <TextField.Input
                                    placeholder="Confirm Password"
                                    type="password"
                                    name="password_confirmation"
                                    size="3"
                                    onChange={(e) =>
                                        setData(
                                            "password_confirmation",
                                            e.target.value
                                        )
                                    }
                                />
                            </TextField.Root>

                            <InputError
                                message={errors.password_confirmation}
                                className="mt-2"
                            />
                        </Box>

                        <Flex
                            direction="row"
                            gap="2"
                            align={"center"}
                            justify={"between"}
                            mt="6"
                        >
                            <Text as="label" size="2">
                                <Flex gap="2">
                                    <Checkbox
                                        name="remember"
                                        checked={data.remember}
                                        onCheckedChange={(checkedState) =>
                                            setData("remember", !!checkedState)
                                        }
                                    />
                                    Remember me
                                </Flex>
                            </Text>
                            <Button
                                className="ms-4"
                                disabled={processing}
                                size={"3"}
                            >
                                Register
                            </Button>
                        </Flex>

                        <Separator mt="4" mb="6" size="4" />

                        <Flex
                            className="text-right"
                            direction="row"
                            gap="2"
                            align={"center"}
                            justify={"between"}
                        >
                            <Text size="2">Already have an account?</Text>
                            <Link href={route("login")}>
                                <RadixLink size="2">
                                    <Button size="2" variant="surface">
                                        Login <ArrowRightIcon />
                                    </Button>
                                </RadixLink>
                            </Link>
                        </Flex>
                    </form>
                </Box>
            </Container>
        </>
    );
}
